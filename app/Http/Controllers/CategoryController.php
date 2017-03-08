<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Category;
use Session;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.blog.categories',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('backend.blog.categories_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title.*'      => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('dashboard/blog/categories')
                ->withErrors($validator);
        } else {
            $category = new Category();
            $category->statue = $request->statue ? $request->statue : 0;
            $category->save();
            foreach ( config('app.locals') as $locale)
            {
                $category->translateOrNew($locale)->title = $request->title[$locale];
            }
            $category->save();
            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/blog/categories');
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
        $category = Category::find($id);
        $posts = $category->posts;
        return view('category',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.blog.categories_edit', compact('category'));
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
        $validator = Validator::make($request->all(), [
            'title.*'      => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('dashboard/blog/categories')
                ->withErrors($validator);
        } else {
            $category = Category::findOrFail($id);
            $category->statue = $request->statue ? $request->statue : 0;
            $category->save();
            foreach ( config('app.locals') as $locale)
            {
                $category->translateOrNew($locale)->title = $request->title[$locale];
            }
            $category->save();
            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/blog/categories');
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
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('message', 'تم بنجاح!');
        return redirect('/dashboard/blog/categories');
    }
}
