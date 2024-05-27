<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function contactus()
    {
        return view('Frontend.Pages.contactus');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validate=Validator::make($request->all(), [
             'name'=>'required',
             'email'=>'required|email',
             'number'=>'required|regex:/^01[3-9][0-9]{8}$/|numeric',
             'message'=>'required',

        ]);

        if($validate->fails())
        {
            // notify()->error($validate->getMessageBag());
            return redirect()->back()->withInput()->withErrors($validate);
        }

      $contact= new Contact();
      $contact->name= $request->name;
      $contact->email= $request->email;
      $contact->number= $request->number;
      $contact->message= $request->message;
      $contact->save();


        //   notify()->success('Message Send succesfully');

          return redirect()->back()->with('success', 'Message send successfully');
    }

    public function list(){
        $inquiries = Contact::all();
        return view('Admin.Pages.Inquiries.list', compact('inquiries'));
    }
}
