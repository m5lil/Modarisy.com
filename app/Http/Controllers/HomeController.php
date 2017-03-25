<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Enquiry;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('filter');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 3) {
            $enquiries = Auth::user()->enquiries()
                ->where('statue', 1)
                ->get();
            $applicants = Applicant::where('student_id', Auth::user()->id)
                ->where('statue', 2)
                ->get();
            $done_applicants = Applicant::where('student_id', Auth::user()->id)
                ->where('statue', 3)
                ->get();
            return view('frontend.student', compact('enquiries', 'applicants', 'done_applicants'));
        } elseif (Auth::user()->type == 2) {
            $enquiries = Enquiry::where('material', \Auth::user()->profile->specialty)
                ->where('statue', 1)
                ->get();
            if (Auth::user()->applicatns) {
                $progress_enquiries = Enquiry::where('teacher_id', Auth::user()->id)
                    ->where('statue', 2)
                    ->get();;
                $done_enquiries = Enquiry::where('teacher_id', Auth::user()->id)
                    ->where('statue', 3)
                    ->get();
            }
            return view('frontend.teacher', compact('enquiries', 'progress_enquiries', 'done_enquiries'));
        }
    }

    public function filter(Request $request, Enquiry $enquiries)
    {

        if ($request->has('material')) {
            $enquiries->where('material', $request->input('material'));
        }

        if ($request->has('preferred_time')) {
            $enquiries->where('preferred_time', $request->input('preferred_time'));
        }

        if ($request->has('lat')) {
            if ($request->input('distance')) {
                $distance = $request->input('distance');
            } else {
                $distance = 100;
            }
            $results = DB::select(DB::raw('SELECT id, ( 6371 * acos( cos( radians(' . $request->input('lat') . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $request->input('lng') . ') ) + sin( radians(' . $request->input('lat') . ') ) * sin( radians(lat) ) ) ) AS distance FROM enquiries HAVING distance < ' . $distance . ' ORDER BY distance'));
//            dd(array_pluck($results, 'id'));
        }

        if (isset($results)) {
            $enquiries = $enquiries->find(array_pluck($results, 'id'));
        }else{
            $enquiries = $enquiries->all();
        }

        return view('frontend.enquiries', compact('enquiries'));
    }


}
