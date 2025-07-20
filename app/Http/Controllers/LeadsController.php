<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadsController extends Controller
{

    public  function Home()
    {

        return view('add-leads');
    }
    public function filter(Request $request)
    {
        $data = Leads::where('name', $request->name)
            ->where('operation',session('id'))
            ->orWhere('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->get();

        return view('filter',compact('data'));
    }
    public function delete($id)
    {
        $data = Leads::find($id);

        $data->delete();
        return redirect()->route('lead.list');
    }
    public function addComment(Request $request)
    {
        Comment::create([
             'leads_id'=>$request->lead,
             'comment'=>$request->body,
             'created_at'=>now(),
              'updated_at'=>now()
        ]);
        return redirect()->back();
    }
    public function Edit(Request $request,$id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'course' => 'nullable|string',
            'unclearPaper' => 'nullable|string',
            'enrolledYear' => 'nullable|string',
            'degreePurpose' => 'nullable|string',
            'date' => 'required|date',
            'operation' => 'required|exists:admins,id',
            'nextfollowup' => 'nullable|date',
            'status' => 'nullable|string',
            'TotalFees' => 'nullable|string',
            'paidFees' => 'nullable|string',
            'Reference' => 'nullable|string',
        ]);

        $lead = Leads::findOrFail($id);

        $lead->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'unclearPaper' => $request->unclearPaper,
            'enrolledYear' => $request->enrolledYear,
            'degreePurpose' => $request->degreePurpose,
            'date' => $request->date,
            'operation' => $request->operation,
            'nextfollowup' => $request->nextfollowup,
            'status' => $request->status,
            'TotalFees' => $request->TotalFees,
            'paidFees' => $request->paidFees,
            'Reference' => $request->Reference,
        ]);

        return redirect()->route('lead.list');
    }
    public function EditLead($id)
    {
        $data = Leads::with(['admin','commented'])->findOrFail($id);
        $admin = Admin::all();

        return view('edit-leads',compact('data','admin'));
    }
    public function LeadsList()
    {
        $data = Leads::with('admin')->where('operation',session('id'))->orderBy('id','DESC')->get();
        return view('leads-list',compact('data'));
    }
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
            'degree_purpose'=>'max:500',
        ]);

        Leads::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'phone' => $request->isd_code.$request->phone,
            'course'=>$request->course,
            'unclearPaper'=>$request->unclear_paper,
            'enrolledYear'=>$request->enrolled_year,
            'degreePurpose'=>$request->degree_purpose,
            'date'=>date('Y-m-d'),
            'operation'=>$request->session()->get('id'),
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

        return redirect()->route('lead.form');

    }

}
