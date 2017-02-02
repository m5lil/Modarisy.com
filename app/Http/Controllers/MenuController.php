<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Page;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('parent_id','asc')->orderBy('order','asc')->get();
        $title = Menu::pluck('title', 'id');
        $title = array_add($title, '0', 'بدون');
        // dd($title);
        return view('backend.menu.index',compact('menus','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::pluck('title', 'id');
        $menus = array_add($menus, '0', 'بدون');
        return view('backend.menu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $menu = new Menu();
        $menu->parent_id = $input['parent_id'];
        $menu->title = $input['title'];
        $menu->url = in_array( $input['url'] , Page::pluck('title','slug')->toArray()) ?  'page/'.$input['url'] : $input['url'] ;
        $menu->order = $input['order'];
        $menu->save();

        return redirect('dashboard/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrfail($id);
        $menus = Menu::where('id', '!=', $menu->id)->pluck('title', 'id');
        $menus = array_add($menus, '0', 'بدون');
        return view('backend.menu.edit',compact('menu','menus'));
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
        $input = $request->except('_token');
        $menu = Menu::findOrfail($id);
        $menu->parent_id = $input['parent_id'];
        $menu->title = $input['title'];
        $menu->url = in_array( $input['url'], Page::pluck('title','slug')->toArray()) ?  'page/'.$input['url'] : $input['url'] ;
        $menu->order = $input['order'];
        $menu->save();

        return redirect('dashboard/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrfail($id);
        $menu->delete();
     	$menu->children()->delete();
        return redirect('dashboard/menu');
    }
}
