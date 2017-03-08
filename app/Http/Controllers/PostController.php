<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Post;
use Session;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.blog.posts',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('backend.blog.posts_create');
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
            return Redirect::to('dashboard/blog/posts')
                ->withErrors($validator);
        } else {
            $post = new Post();
            $post->statue = $request->statue ? $request->statue : 0;
            $post->save();
            foreach ( config('app.locals') as $locale)
            {
                $post->translateOrNew($locale)->title = $request->title[$locale];
            }
            $post->save();
            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/blog/posts');
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
        $post = Post::find($id);
        $posts = $post->posts;
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
        $post = Post::find($id);
        return view('backend.blog.posts_edit', compact('category'));
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
            return Redirect::to('dashboard/blog/posts')
                ->withErrors($validator);
        } else {
            $post = Post::findOrFail($id);
            $post->statue = $request->statue ? $request->statue : 0;
            $post->save();
            foreach ( config('app.locals') as $locale)
            {
                $post->translateOrNew($locale)->title = $request->title[$locale];
            }
            $post->save();
            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/blog/posts');
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
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('message', 'تم بنجاح!');
        return redirect('/dashboard/blog/posts');
    }
}
