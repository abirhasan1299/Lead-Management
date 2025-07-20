<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function AddLeads(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:leads',
            'isd_code'=>'required|regex:/^\+\d{1,4}$/',
            'phone' => 'required|unique:leads|regex:/^\d{6,14}$/',
            'course'=>'max:500',
            'unclear_paper'=>'max:500',
            'enrolled_year'=>'max:10',
            'degreePurpose'=>'max:500',
        ]);

        Leads::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'phone' => $request->isd_code.$request->phone,
            'course'=>$request->course,
            'unclearPaper'=>$request->unclear_paper,
            'enrolledYear'=>$request->enrolled_year,
            'degreePurpose'=>$request->degreePurpose,
            'date'=>date('Y-m-d'),
            'operation'=>3,
            'nextfollowup'=>date('Y-m-d'),
            'status'=>'live',
            'comment'=>'None',
            'TotalFees'=>0,
            'paidFees'=>0,
            'Reference'=>"None"

        ]);

        $data = [
            'name'=>$request->name
        ];

        Mail::to($request->email)->send(new TestMail($data));

        return redirect()->route('home')->with('success',"Thanks for Registering");

    }

    public function Login()
    {
        return view('login');
    }
    public function Home()
    {
        return view('home');
    }


}
