<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use App\Enquiry;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries = Enquiry::orderBy('statue', 'asc')->get();
        return view('backend.enquiry.index', compact('enquiries'));
    }

    public function statue($type)
    {
        if ($type == 'suspend') {
            $enquiries = Enquiry::where('statue', 0)->paginate(20);
        } elseif ($type == 'active') {
            $enquiries = Enquiry::where('statue', 1)->paginate(20);
        } elseif ($type == 'in-progress') {
            $enquiries = Enquiry::where('statue', 2)->paginate(20);
        } elseif ($type == 'done') {
            $enquiries = Enquiry::where('statue', 3)->paginate(20);
        }
        return view('backend.enquiry.index', compact('enquiries'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->type == 3) {
            return view('frontend.request');
        } elseif (\Auth::user()->type == 2) {
            \Session::flash('message', 'لا يمكنك إضافة طلب لأنك ليس طالب');
            return redirect('/');
        } else {
            \Session::flash('message', 'قم بالتسجيل أولا لتتمكن من إضافة طلب');
            return redirect('/register?t=3');
        }

    }

    public function createRequest()
    {
        if (\Auth::user()->type == 3) {
            Cache::put('subject', Input::get('subject'), 2);
            Cache::put('total_hours', Input::get('total_hours'), 2);
            return view('frontend.request');
        } elseif (\Auth::user()->type == 2) {
            \Session::flash('message', 'لا يمكنك إضافة طلب لأنك ليس طالب');
            return redirect('/');
        } else {
            \Session::flash('message', 'قم بالتسجيل أولا لتتمكن من إضافة طلب');
            return redirect('/register?t=3');
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
            'total_hours'    => 'required',
            'preferred_time' => 'required',
            'subject'        => 'required',
            'target'         => 'required',
            'comment'        => 'required',
            'material'       => 'required',
            'lat'            => 'required',
        );
        $messages = [
            'lat.required'    => 'رجاء قم بإختيار موقعك على الخريطه.',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()
                ->withErrors($validator);
        } else {
            $enquire = new Enquiry();
            $enquire->user_id = \Auth::user()->id;
            $enquire->total_hours = $request->total_hours;
            $enquire->preferred_time = $request->preferred_time;
            $enquire->subject = $request->subject;
            $enquire->target = $request->target;
            $enquire->comment = $request->comment;
            $enquire->material = $request->material;
            $enquire->lat = $request->lat;
            $enquire->lng = $request->lng;
            $enquire->save();

            // redirect
            \Session::flash('message', 'سوف نقوم بمراجعة طلب أولا وخلال 24 ساعة سوف يتم الموافقة عليه فى حال لم نجد مايمنع ذلك!');
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
        return Enquiry::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        if ($enquiry) {
            if ($enquiry->statue == 0) {
                $enquiry->statue = '1';
                $enquiry->save();
                \Session::flash('message', 'تم تنشيط العرض');
            } elseif ($enquiry->statue == 1) {
                $enquiry->statue = '0';
                $enquiry->save();
                \Session::flash('message', 'تم تعليق العرض');
            } else {
                \Session::flash('message', 'لايمكن تعديل الحالة حاليا');
            }
        }
        return redirect()->back();


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
    public function delete($id)
    {
        if (Enquiry::find($id)->user->id == \Auth::user()->id) {
            $applicants = Applicant::where('enquiry_id', Enquiry::find($id)->id);
            $applicants->delete();
            Enquiry::destroy($id);
            \Session::flash('message', 'تم الحذف');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Enquiry::destroy($id);
        \Session::flash('message', 'تم الحذف');
        return redirect()->back();

    }
}
