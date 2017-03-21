<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Lecture;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 3) {
            $enqueries = Auth::user()->lectures;
            $applicants = Applicant::where('student_id', Auth::user()->id)
                ->where('statue', 3)
                ->get();
            $done_applicants = Applicant::where('student_id', Auth::user()->id)
                ->where('statue', 3)
                ->get();
            return view('frontend.student', compact('enqueries', 'applicants', 'done_applicants'));
        } elseif (Auth::user()->type == 2) {
            $enqueries = Lecture::where('material', \Auth::user()->profile->specialty)->get();
            if (Auth::user()->applicants) {
                $progress_enqueries = Auth::user()->applicants->where('statue', 2)->get();
                $done_enqueries = Lecture::where('teacher_id', Auth::user()->id)
                    ->where('statue', 3)
                    ->get();
            }
            return view('frontend.teacher', compact('enqueries', 'progress_enqueries', 'done_enqueries'));
        }
    }
}
