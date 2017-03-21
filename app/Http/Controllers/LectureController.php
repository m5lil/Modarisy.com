<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use App\Lecture;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::orderBy('statue', 'asc')->get();
        return view('backend.lecture.index', compact('lectures'));
    }

    public function statue($type)
    {
        if ($type == 'suspend') {
            $lectures = Lecture::where('statue', 0)->paginate(20);
        } elseif ($type == 'active') {
            $lectures = Lecture::where('statue', 1)->paginate(20);
        } elseif ($type == 'in-progress') {
            $lectures = Lecture::where('statue', 2)->paginate(20);
        } elseif ($type == 'done') {
            $lectures = Lecture::where('statue', 3)->paginate(20);
        }
        return view('backend.lecture.index', compact('lectures'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->type == 3){
            return view('frontend.request');
        }elseif (\Auth::user()->type == 2){
            \Session::flash('message', 'لا يمكنك إضافة طلب لأنك ليس طالب');
            return redirect('/');
        }else{
            \Session::flash('message', 'قم بالتسجيل أولا لتتمكن من إضافة طلب');
            return redirect('/register?t=3');
        }

    }

    public function createRequest()
    {
        if (\Auth::user()->type == 3){
            Cache::put('subject', Input::get('subject'), 2);
            Cache::put('total_hours', Input::get('total_hours'), 2);
            return view('frontend.request');
        }elseif (\Auth::user()->type == 2){
            \Session::flash('message', 'لا يمكنك إضافة طلب لأنك ليس طالب');
            return redirect('/');
        }else{
            \Session::flash('message', 'قم بالتسجيل أولا لتتمكن من إضافة طلب');
            return redirect('/register?t=3');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'total_hours'    => 'required',
            'preferred_time' => 'required',
            'subject'        => 'required',
            'target'         => 'required',
            'comment'        => 'required',
            'material'       => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::back()
                ->withErrors($validator);
        } else {
            $enquire = new Lecture();
            $enquire->user_id = \Auth::user()->id;
            $enquire->total_hours = $request->total_hours;
            $enquire->preferred_time = $request->preferred_time;
            $enquire->subject = $request->subject;
            $enquire->target = $request->target;
            $enquire->comment = $request->comment;
            $enquire->material = $request->material;
            $enquire->save();

            // redirect
            \Session::flash('message', 'سوف نقوم بمراجعة طلب أولا وخلال 24 ساعة سوف يتم الموافقة عليه فى حال لم نجد مايمنع ذلك!');
            return \Redirect::to('/home');

        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Lecture::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $lecture = Lecture::findOrFail($id);
        if($lecture) {
            if ($lecture->statue == 0) {
                $lecture->statue = '1';
                $lecture->save();
                \Session::flash('message', 'تم تنشيط العرض');
            }elseif ($lecture->statue == 1){
                $lecture->statue = '0';
                $lecture->save();
                \Session::flash('message', 'تم تعليق العرض');
            }else{
                \Session::flash('message', 'لايمكن تعديل الحالة حاليا');
            }
        }
        return redirect()->back();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        if(Lecture::find($id)->user->id == \Auth::user()->id){
            $applicants = Applicant::where('lecture_id', Lecture::find($id)->id);
            $applicants->delete();
            Lecture::destroy($id);
            \Session::flash('message', 'تم الحذف');
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Lecture::destroy($id);
        \Session::flash('message', 'تم الحذف');
        return redirect()->back();

    }
}
