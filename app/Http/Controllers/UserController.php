<?php

namespace App\Http\Controllers;

use App\Profile;
use Dotenv\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Bouncer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 1)->paginate(20);
        return view('backend.user.index', compact('users'));
    }

    public function members($type)
    {
        if ($type == 'students') {
            $users = User::where('type', 3)->paginate(20);
            return view('backend.user.index', compact('users'));
        } elseif ($type == 'teachers') {
            $teachers = User::where('type', 2)->paginate(20);

            return view('backend.user.index', compact('teachers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
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
//        dd($request->all());
        $user = User::findOrFail($id);
        if (!empty($input['role'])){
            if (null !== $user->roles()->first()) {
                Bouncer::retract($user->roles()->pluck('name'))->from($user);
            }
            Bouncer::assign($request->role)->to($user);
        }
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user->update($input);
        \Session::flash('message', 'تم بنجاح!');
        return Redirect::to('dashboard/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message', 'تم بنجاح!');
        return redirect()->back();

    }
}
