<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{   public function viewcontact()
    {
       $contacts = Contact::first();
         return view('admin2.layout.contact.contact', compact('contacts'));
    }

    public function fetchtable()
    {
        $contacts = Contact::all();
        return view('admin2.layout.contact.contacttable', compact('contacts'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'mainheading' => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
            'description' => 'required|string|',
            'phonenumber' => 'required|string|max:12',
            'email' => 'required|email|max:255',

        ]);
        Contact::create([
            'mainheading' => $req->mainheading,
            'subheading' => $req->subheading,
            'description' => $req->description,
            'phonenumber' => $req->phonenumber,
            'email' => $req->email,
        ]);
 return redirect()->back()->with('success','ontact details added successfully');
  }

    public function edit($id)
    {
        $contacts = Contact::findorfail($id);
        return view('admin2.layout.contact.edit', compact('contacts'));
    }

    public function update(Request $req,$id)
    {
        $req->validate([
            'mainheading' => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
            'description' => 'required|string|',
            'phonenumber' => 'required|string|max:12',
            'email' => 'required|email|max:255',

        ]);

        $contacts = Contact::findorfail( $id);

        $contacts->mainheading = $req->mainheading;
        $contacts->subheading = $req->subheading;
        $contacts->description = $req->description;
        $contacts->phonenumber = $req->phonenumber;
        $contacts->email = $req->email;
        $contacts->save();

        return redirect()->route('admin2.contact.view')->with('success', 'Contact details updated successfully');
       }



    //
}
