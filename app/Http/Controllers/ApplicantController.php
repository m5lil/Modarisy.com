<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::orderBy('statue', 'asc')->get();
        return view('backend.applicant.index', compact('applicants'));
    }

    public function allApplicants($enquiry_id)
    {
        if (\Auth::user()->id == Enquiry::find($enquiry_id)->user->id) {
            $applicants = Applicant::orderBy('statue', 'asc')->where('enquiry_id', $enquiry_id)->where('statue', 1)
                ->get();
            return view('frontend.applicants', compact('applicants', 'enquiry_id'));
        } else {
            return redirect()->back();
        }
    }

    public function statue($type)
    {
        if ($type == 'suspend') {
            $applicants = Applicant::where('statue', 0)->paginate(20);
        } elseif ($type == 'active') {
            $applicants = Applicant::where('statue', 1)->paginate(20);
        } elseif ($type == 'in-progress') {
            $applicants = Applicant::where('statue', 2)->paginate(20);
        } elseif ($type == 'done') {
            $applicants = Applicant::where('statue', 3)->paginate(20);
        }
        return view('backend.applicant.index', compact('applicants'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (\Auth::user()->type == 2) {
            return view('frontend.new_applicant', compact('id'));
        } elseif (\Auth::user()->type == 3) {
            \Session::flash('message', 'لا يمكنك إضافة طلب لأنك طالب');
            return redirect('/');
        } else {
            \Session::flash('message', 'قم بالتسجيل أولا لتتمكن من إضافة طلب');
            return redirect('/register?t=2');
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
            'hour_price' => 'required',
            'brief'      => 'required',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::back()
                ->withErrors($validator);
        } else {
            $enquire = new Applicant();
            $enquire->user_id = \Auth::user()->id;
            $enquire->enquiry_id = $request->enquiry_id;
            $enquire->brief = $request->brief;
            $enquire->hour_price = $request->hour_price;
            $enquire->paid = 0;
            $enquire->statue = 0;
            $enquire->save();

            // redirect
            \Session::flash('message', 'سوف نقوم بمراجعة العرض أولا وخلال 24 ساعة سوف يتم الموافقة عليه فى حال لم نجد مايمنع ذلك!');
            return \Redirect::to('/home');

        }
    }


    public function accept($enquiry_id, $applicant_id)
    {
        $accept = Enquiry::findOrFail($enquiry_id);
        $applicant = Applicant::find($applicant_id);
        $teacher_id = Applicant::find($applicant_id)->user->id;
        if ($accept) {
            $accept->applicant_id = $applicant_id;
            $accept->statue = 2;
            $accept->teacher_id = $teacher_id;
            $accept->save();

            $applicant->statue = 2;
            $applicant->student_id = Auth::user()->id;
            $applicant->save();

            \Session::flash('message', 'تم الموافقة بنجاح');
            return \Redirect::to('/messages' . '/' . $enquiry_id . '/' . $applicant_id);

        }

    }

    public function finish(Request $request)
    {
        $accept = Enquiry::findOrFail($request->enquiry_id);
        $applicant = Applicant::find($request->applicant_id);
        if ($accept) {

        $user = Auth::user();
        $profile = $applicant->user->profile;
//        dd($profile);

        $profile->createReview([
            'title'  => $request->title,
            'body'   => $request->body,
            'rating' => $request->rating,
        ], $user);

            $accept->statue = 3;
            $accept->save();

            $applicant->statue = 3;
            $applicant->save();

            \Session::flash('message', 'تهانينا !!');
            return \Redirect::back();

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
        return Applicant::findOrFail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $applicant = Applicant::findOrFail($id);
        if ($applicant) {
            if ($applicant->statue == 0) {
                $applicant->statue = '1';
                $applicant->save();
                \Session::flash('message', 'تم تنشيط العرض');
            } elseif ($applicant->statue == 1) {
                $applicant->statue = '0';
                $applicant->save();
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
        if (Applicant::find($id)->user->id == \Auth::user()->id) {
            Applicant::destroy($id);
            \Session::flash('message', 'تم الحذف');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        Applicant::destroy($id);
        \Session::flash('message', 'تم الحذف');
        return redirect()->back();

    }

}




