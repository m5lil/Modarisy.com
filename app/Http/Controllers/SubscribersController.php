<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Validator;
use Illuminate\Support\Facades\Input;
class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(20);
        return view('backend.subscriber.index',compact('subscribers'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Subscriber::destroy($id);
    }


    public function Submit() {
        $validation = Validator::make(Input::all(), array(
                'name' => 'required',
                'email' => 'required|email|unique:subscribers,email'
            )
        );

        if($validation->fails()) {
            return $validation->errors()->first();
        } else {

            $create = Subscriber::create(array(
                'name' => Input::get('name'),
                'email' => Input::get('email')
            ));

            //If successful, we will be returning the '1' so the form//understands it's successful
            //or if we encountered an unsuccessful creation attempt,return its info
            return $create?'1':'We could not save your address to oursystem, please try again later';
        }
    }

}
