<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
use App\Page;
use Jenssegers\Date\Date;
use Validator;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::all();
        return view('backend.page.index',compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title'       => 'required',
            'body' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('dashboard/pages')
                ->withErrors($validator);
        } else {
            Page::create($request->all());

            // redirect
            Session::flash('message', 'تم بنجاح!');
            return Redirect::to('dashboard/pages');
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
        return Page::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.page.edit', compact('page'));
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
        $input = $request->all();
        Page::findOrFail($id)->update($input);
    }
    public function ajax(Request $request)
    {
        // ($request);
        $page = Page::findOrFail($request->id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->body = $request->body;
        $page->statue = $request->statue;
        $page->seo_title = $request->seo_title;
        $page->seo_keywords = $request->seo_keywords;
        $page->seo_description = $request->seo_description;

        $page->save();
        $msg ='message';
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Page::destroy($id);
    }
    public function delete(Request $request)
    {
        Page::find($request->id)->delete();
        return response()->json();
    }
}
