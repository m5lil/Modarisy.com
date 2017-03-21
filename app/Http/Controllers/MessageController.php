<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        $message = Message::all();
        return view('backend.lecture.index',compact('message'));
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

    public function allMessages($lecture_id, $applicant_id)
    {

        $student_messages = Message::where('lecture_id',$lecture_id)
            ->where('applicant_id',$applicant_id)
            ->where('user_id', Auth::user()->id)
            ->get();

        $teacher_messages = Message::where('lecture_id',$lecture_id)
            ->where('applicant_id',$applicant_id)
            ->where('user_id', Applicant::find($applicant_id)->user->id)
            ->get();
        $messages = $student_messages->merge($teacher_messages)->sortByDesc('created_at');;

        return view('frontend.messages',compact('messages','lecture_id','applicant_id'));

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
            $msg->user_id = \Auth::user()->id;
            $msg->lecture_id = $request->lecture_id;
            $msg->body = $request->body;
            $msg->attached = $request->attached;
            $msg->applicant_id = $request->applicant_id;
            $msg->save();

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
