<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (\Auth::user()->statue == 0){
            return view('frontend.new_profile');
        }else{
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
            'teach_time'  => 'nullable',
            'teach_hours' => 'max:10',
            'hour_rate'   => 'nullable',
            'intro'       => 'required',
            'gender'      => 'required',
            'school'      => 'required',
            'dbirth'      => 'required|date',
            'age'         => 'required',
            'photo'       => 'nullable',
            'specialty'   => 'nullable',
            'hear'        => 'required',
            'lang'        => 'required',
            'level'       => 'nullable'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::back()
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
            $profile->age = $request->age;
            $profile->hear = $request->hear;
            $profile->specialty = $request->specialty;
            $profile->lang = $request->lang;
            $profile->level = $request->level;
            $profile->photo = $request->photo;
            $profile->save();

            // redirect
            \Session::flash('message', 'تم بنجاح!');
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
        return view('frontend.profile', compact('profile'));
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
        //
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
