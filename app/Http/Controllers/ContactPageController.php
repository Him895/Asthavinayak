<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{  public function index()
    {
        $contacts = Contact::first(); // Or get(), if you expect multiple records
        $contact = $contacts; // If using same model for email/phone
        return view('contactus',compact('contact'));
    }
    //
}
