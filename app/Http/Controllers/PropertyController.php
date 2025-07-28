<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{    public function index(){
    $properteies = Property::all(); // Fetch all properties, you can adjust the limit as needed
    $headerMessages = Message::latest()->take(5)->get();

   // Debugging line to check the properties
return view('admin2.layout.properteysection.properteysection', compact('properteies','headerMessages'));
}

public function property(){
    $properties = Property::all(); // Fetch all properties
    return view('properties',compact('properties'));
}

public function pagination(){
    $properties = Property::paginate(6); // Fetch properties with pagination
    return view('properties', compact('properties')); // Return the view with the properties
}





      public function store(Request $req){
        $req->validate([
            'heading' => 'required|string',
            'subheading' => 'required|string',
            'type'=> 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' =>  'required|numeric',

            'address' => 'required|string',
            'specification' => 'required|',
            'details' => 'required|array',
        ]);

        $imagePath = $req->file('image')->store('images','public');

        Property::create([
            'heading' => $req->heading,
            'subheading' => $req->subheading,
            'type' => $req->type,
            'image' => $imagePath,
            'price' => $req->price,
            'address' => $req->address,
            'details'=> $req->details,
            'specification'=> $req->specification, // Add the specification field

        ]);
          return redirect()->back()->with('success', 'Property Added!');
      }

    //
}
