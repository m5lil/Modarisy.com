<?php

namespace App\Http\Controllers;

use App\Edulevel;
use App\Materials;
use App\Testimonial;
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
            return \Redirect::to('dashboard/materials')
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

    public function get_testimonials()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonials', compact('testimonials'));
    }

    public function add_testimonial(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'name'  => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/testimonials')
                ->withErrors($validator);
        } else {

            $request = $this->saveFiles($request);

            Testimonial::create($request->all());              //save
            // redirect
            \Session::flash('message', 'تم بنجاح!');
            return \Redirect::to('dashboard/testimonials');
        }
    }

    public function delete_testimonial($id)
    {
        $material = Testimonial::findOrFail($id);
        $material->delete();
        \Session::flash('message', 'تم بنجاح!');
        return redirect('/dashboard/testimonials');
    }

    public function get_edulevels()
    {
        $edulevels = Edulevel::all();
        return view('backend.edulevels', compact('edulevels'));
    }


    public function add_edulevel(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'slug'  => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('dashboard/edulevels')
                ->withErrors($validator);
        } else {

            $request = $this->saveFiles($request);

            Edulevel::create($request->all());              //save
            // redirect
            \Session::flash('message', 'تم بنجاح!');
            return \Redirect::to('dashboard/edulevels');
        }
    }

    public function delete_edulevel($id)
    {
        $material = Edulevel::findOrFail($id);
        $material->delete();
        \Session::flash('message', 'تم بنجاح!');
        return redirect('/dashboard/edulevels');
    }

}
