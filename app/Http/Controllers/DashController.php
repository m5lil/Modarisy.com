<?php

namespace App\Http\Controllers;

use App\Materials;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }


    public function get_materials()
    {
        $materials = Materials::all();
        return view('backend.materials', compact('materials'));
    }

    public function add_material(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'slug'  => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/materials')
                ->withErrors($validator);
        } else {
            Materials::create($request->all());              //save
            // redirect
            \Session::flash('message', 'تم بنجاح!');
            return \Redirect::to('dashboard/materials');
        }
    }

    public function delete_material($id)
    {
        $material = Materials::findOrFail($id);
        $material->delete();
        \Session::flash('message', 'تم بنجاح!');
        return redirect('/dashboard/materials');
    }

}
