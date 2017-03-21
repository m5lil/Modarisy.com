<?php

namespace App\Http\Controllers;

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
            return view('frontend.student', compact('enqueries'));
        } elseif (Auth::user()->type == 2) {
            $enqueries = Lecture::where('material', \Auth::user()->profile->specialty)->get();
            $progress_enqueries = Lecture::where('teacher_id', Auth::user()->id)->get();
            $done_enqueries = Lecture::where('teacher_id', Auth::user()->id)
                ->where('statue', 3)
                ->get();
            return view('frontend.teacher', compact('enqueries','progress_enqueries','done_enqueries'));
        }
    }
}
