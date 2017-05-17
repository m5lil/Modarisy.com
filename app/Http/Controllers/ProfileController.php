<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Enquiry;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\In;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//


        $profiles = Profile::where('statue', 1)->get();

        return view('frontend.all_profile', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->statue == 0) {
            return view('frontend.new_profile');
        } else {
            return \Redirect::to('/home');
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
            'gen_exp'     => 'nullable',
            'teach_hours'  => 'required',
            'hour_rate'   => 'nullable',
//            'intro'       => 'required',
            'gender'      => 'required',
//            'school'      => 'required',
            'dbirth'      => 'required|before:' . (Carbon::now()->subYears(13)->toDateString()),
            'photo'       => 'image',
            'specialty'   => 'nullable',
//            'hear'        => 'required',
            'lang'        => 'required',
//            'level'       => 'nullable',
            'lat'            => 'required',


        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::back()->withInput()
                ->withErrors($validator);
        } else {
            $request = $this->saveFiles($request);
            $profile = new Profile();
            $profile->user_id = \Auth::user()->id;
            $profile->statue = 0;
            $profile->gen_exp = $request->gen_exp;
            $profile->sch_exp = $request->sch_exp;
            $profile->teach_time = $request->teach_time;
            $profile->teach_hours = $request->teach_hours;
            $profile->hour_rate = $request->hour_rate;
            $profile->intro = $request->intro;
            $profile->gender = $request->gender;
            $profile->school = $request->school;
            $profile->dbirth = $request->dbirth;
            $profile->age = Carbon::parse($request->dbirth)->age;
            $profile->hear = $request->hear;
            $profile->specialty = $request->specialty;
            $profile->lang = $request->lang;
            $profile->level = $request->level;
            $profile->photo = $request->photo;
            $profile->lat = $request->lat;
            $profile->lng = $request->lng;
//            dd($request);
            $profile->save();
            // redirect
            \Session::flash('message', 'تم بنجاح!');
            Mail::send('emails.send', ['title' => 'أهلا ومرحبا بك فى مدرسي', 'content' => 'نشكرك على التسجيل فى موقع مدرسي ' ], function ($message) use ($profile)
            {
                $message->from('no-reply@modarisy.com', 'Modarisy Platform');
                $message->subject('Modarisy Platform');
                $message->to($profile->user->email);
            });

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
        $profile = User::find($id)->profile;
        if ($profile->user->type == 3) {
            $enquiries = $profile->user->enquiries()
                ->where('statue', 1)->get();
            $applicants = Applicant::where('student_id', $profile->user->id)
                ->where('statue', 2)->get();
            $done_applicants = Applicant::where('student_id', $profile->user->id)
                ->where('statue', 3)->get();
            return view('frontend.profile', compact('profile','enquiries', 'applicants', 'done_applicants'));
        } elseif ($profile->user->type == 2) {
            if ($profile->user->applicants) {
                $progress_enquiries = Enquiry::where('teacher_id', $profile->user->id)
                    ->where('statue', 2)->get();
                $done_enquiries = Enquiry::where('teacher_id', $profile->user->id)
                    ->where('statue', 3)->get();
                }
            return view('frontend.profile', compact('profile', 'progress_enquiries', 'done_enquiries'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rules = array(
            'gen_exp'     => 'nullable',
            'teach_time'  => 'nullable',
            'teach_hours' => 'max:10',
            'hour_rate'   => 'nullable',
//            'intro'       => 'required',
            'gender'      => 'required',
//            'school'      => 'required',
            'dbirth'      => 'required|before:' . (Carbon::now()->subYears(13)->toDateString()),
            'photo'       => 'image',
            'specialty'   => 'nullable',
//            'hear'        => 'required',
            'lang'        => 'required',
//            'level'       => 'nullable',
//            'lat'            => 'required',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::back()->withInput()
                ->withErrors($validator);
        } else {
            $request = $this->saveFiles($request);
            $profile = Profile::find($id);
            $profile->user_id = \Auth::user()->id;
            $profile->statue = 0;
            $profile->gen_exp = $request->gen_exp;
            $profile->sch_exp = $request->sch_exp;
            $profile->teach_time = $request->teach_time;
            $profile->teach_hours = $request->teach_hours;
            $profile->hour_rate = $request->hour_rate;
            $profile->intro = $request->intro;
            $profile->gender = $request->gender;
            $profile->school = $request->school;
            $profile->dbirth = $request->dbirth;
            $profile->age = Carbon::parse($request->dbirth)->age;
            $profile->specialty = $request->specialty;
            $profile->lang = $request->lang;
            $profile->level = $request->level;
            if ($request->photo != null){
                 $profile->photo = $request->photo;
            }
            $profile->save();
            // redirect
            \Session::flash('message', 'تم بنجاح!');
            return \Redirect::to('/home');

        }

    }


    public function activate($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            if ($profile->statue == 0) {
                $profile->statue = '1';
                $profile->save();
                \Session::flash('message', 'تم تنشيط العضو');
            } elseif ($profile->statue == 1) {
                $profile->statue = '0';
                $profile->save();
                \Session::flash('message', 'تم تعليق العضو');
            } else {
                \Session::flash('message', 'لايمكن تعديل الحالة حاليا');
            }
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
