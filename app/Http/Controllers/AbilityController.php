<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Bouncer;
use Validator;
use App\User;
use Session;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Bouncer::role()->all();
        $abilities = Bouncer::ability()->pluck('name', 'name');
        return view('backend.user.roles',compact('roles','abilities','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.user.roles');
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
            'name'       => 'required',
            'abilities'       => 'required',
            'title' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/abilities')
                ->withErrors($validator);
        } else {
            $role = Bouncer::role();
            $role->name = $request->name;
            $role->title = $request->title;
            $role->save();
            Bouncer::allow($request->name)->to($request->abilities);
            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/abilities');
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
        $role = Bouncer::role()->find($id);
        return view('backend.user.edit_role', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Bouncer::role()->find($id);
        $abilities = Bouncer::ability()->pluck('name', 'name');
        $a = $role->abilities()->pluck('name','name')->toArray();
        return view('backend.user.edit_role', compact('role','abilities','a'));
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
        $rules = array(
            'name'       => 'required',
            'abilities'       => 'required',
            'title' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/abilities')
                ->withErrors($validator);
        } else {
            $role = Bouncer::role()->findOrfail($id);
            $role->abilities()->detach();
            Bouncer::allow($request->name)->to($request->abilities);
            $role->name = $request->name;
            $role->title = $request->title;
            $role->save();
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/abilities');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
