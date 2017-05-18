<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Enquiry;
use App\User;
use Illuminate\Http\Request;
use App\Message;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $message = Message::all();
        return view('backend.enquiry.index',compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.message');
    }

    public function allMessages($enquiry_id, $applicant_id)
    {
        if(Applicant::find($applicant_id)->statue != 0 || Enquiry::find($enquiry_id)->statue != 0){
            $student_id = Enquiry::find($enquiry_id)->user->id;
            $teacher_id = Applicant::find($applicant_id)->user->id;
            if ($student_id == Auth::user()->id || $teacher_id == Auth::user()->id){
                $student_messages = Message::where('to', $teacher_id)
                    ->where('enquiry_id', $enquiry_id)
                    ->where('applicant_id', $applicant_id)
                    ->where('user_id', $student_id)
                    ->get();
                $teacher_messages = Message::where('to', $student_id)
                    ->where('enquiry_id', $enquiry_id)
                    ->where('applicant_id', $applicant_id)
                    ->where('user_id', $teacher_id)
                    ->get();
                $messages = $student_messages->merge($teacher_messages)->sortByDesc('created_at');
//            dd($student_id);
            }else{
                abort(405);
            }
            return view('frontend.messages',compact('messages','enquiry_id','applicant_id'));

        }

        \Session::flash('message', 'بعد الموافقة يمكنك ارسال رساله!');
        return \Redirect::back();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'body' => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('messages')
                ->withErrors($validator);
        } else {
            $msg = new Message();
            if (Input::file('attached')) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('attached')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('attached')->move($destinationPath, $fileName); // uploading file to given path
                $msg->attached = $fileName;
            }

            $msg->user_id = \Auth::user()->id;
            $msg->enquiry_id = $request->enquiry_id;
            $msg->body = $request->body;
            $msg->applicant_id = $request->applicant_id;
            if(Auth::user()->type == 3){
                $msg->to = Applicant::find($request->applicant_id)->user->id;
            }elseif (Auth::user()->type == 2){
                $msg->to = Enquiry::find($request->enquiry_id)->user->id;
            }
            $msg->save();

            Mail::send('emails.send', ['title' => 'لديك رسالة جديده', 'content' => 'لديك رسالة جديدة من ' , 'teacher' =>  \Auth::user()], function ($message) use ($msg)
            {
                $message->from('no-reply@modarisy.com', 'Modarisy Platform');
                $message->to(User::find($msg->to)->email);
            });

            \Session::flash('message', 'تم بنجاح!');
            return \Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Message::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Message::find($id);
        return view('backend.message.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Rapid way
        $input = $request->all();
        Message::findOrFail($id)->update($input);


        //Another Way

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Message::destroy($id);
    }
}
