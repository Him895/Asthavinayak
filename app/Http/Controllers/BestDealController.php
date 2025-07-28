<?php

namespace App\Http\Controllers;

use App\Models\BestDeal;
use App\Models\Message;
use Illuminate\Http\Request;

class BestDealController extends Controller
{
    public function index(){
        $deals = BestDeal::all();
                $headerMessages = Message::latest()->take(5)->get();


       return view('admin2.layout.bestdealsSection.bestdealssection', compact('deals','headerMessages'));

    }

    public function fetchtable(){
        $deals = BestDeal::all();
        return view('admin2.layout.bestdealsSection.bestdealtable', compact('deals'));
    }

    public function store(Request $req){
        $req->validate([
            'type' => 'required||string',
            'heading' => 'required||string',
            'subheading'=> 'required||string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required||string',
            'details_keys' => 'required||array',
            'details_values' => 'required||array',
        ]);
        // Handle image upload
        $imagePath = $req->file('image')->store('images','public');

        // convert keys value into json//

        $details = [];
        foreach ($req->details_keys as $index => $key){
            $value = $req->details_values[$index] ?? '';
            $details [] = ['key' => $key, 'value' => $value];
        }

        BestDeal::create([
            'type' => $req->type,
            'heading' => $req->heading,
            'subheading' => $req->subheading,
            'image' => $imagePath,
            'description' => $req->description,
            'details' => json_encode($details),

        ]);
        return redirect()->back()->with('success','Best Deals added successfully');
    }

    public function edit($id){
        $deals = BestDeal::findOrFail($id);
        return view('admin2.layout.bestdealsSection.edit', compact('deals'));
    }

    public function update(Request $req){
        $req->validate([
            'type' => 'required|string',
            'heading' => 'required|string',
            'subheading' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'details_keys' => 'required|array',
            'details_values' => 'required|array',


        ]);

        $bestDeal = BestDeal::findOrFail($req->id);
        $bestDeal->type = $req->type;
        $bestDeal->heading = $req->heading;
        $bestDeal->subheading = $req->subheading;
        $bestDeal->description = $req->description;
        // Handle image upload
        if ($req->hasFile('image')) {
            $imagePath = $req->file('image')->store('images', 'public');
            $bestDeal->image = $imagePath;
    }
        // convert keys value into json//
        $details = [];
        foreach ($req->details_keys as $index => $key) {
            $value = $req->details_values[$index] ?? '';
            $details[] = ['key' => $key, 'value' => $value];
        }
        $bestDeal->details = json_encode($details);
        $bestDeal->save();

    return redirect()->route('admin2.bestdeals.index')->with('success', 'BeastDeal Section updated successfully!');
    }
    public function destroy($id){
        $bestDeal = BestDeal::findOrFail($id);
        $bestDeal->delete();
    return redirect()->route('admin2.bestdeals.index')->with('success', 'BeastDeal Section updated successfully!');
    }
    //
}
