<?php

namespace App\Http\Controllers;

use App\Models\FeaturedSection;
use App\Models\Message;
use Illuminate\Http\Request;

class FeaturedSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featured = FeaturedSection::all();
        $headerMessages = Message::latest()->take(5)->get();

        return view('admin2.layout.featuredsection.featuredsection',compact('featured','headerMessages'));
        //
    }

    public function fetchtable()
    {
        $featured = FeaturedSection::all();
        return view('admin2.layout.featuredsection.featurestable',compact('featured'));
        //
    }

    public function store(Request $req){
        $req->validate([
            'left_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
            'accordion_titles' => 'required|array',
    'accordion_contents' => 'required|array',
            'info_keys' => 'required|array',
        'info_values' => 'required|array',
        'info_icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Uploads images
         $leftImagePath = $req->file('left_image')->store('images','public');
         $iconImagePath = $req->file('icon_image')->store('images','public');



         $accordions = collect($req->accordion_titles)->map(function ($title, $i) use ($req) {
        return [
            'title' => $title,
            'content' => $req->accordion_contents[$i],
        ];
    });

     // Handle info_table
    $infoTable = [];
    foreach ($req->info_keys as $i => $key) {
        $iconPath = null;
        if ($req->hasFile('info_icons') && isset($req->file('info_icons')[$i])) {
            $iconPath = $req->file('info_icons')[$i]->store('icons', 'public');
        }

        $infoTable[] = [
            'key' => $key,
            'value' => $req->info_values[$i],
            'icon' => $iconPath,
        ];
    }

         // create Featuredsection

         FeaturedSection::create([
            'left_image' => $leftImagePath,
            'icon_image' => $iconImagePath,
            'heading' => $req->heading,
            'subheading' => $req->subheading,
            'accordions' => json_encode($accordions),
           'info_table' => json_encode($infoTable), // ✅ FIXED HERE


         ]);

         return redirect()->back()->with('success','Featured Section added successfully!');



    }






    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $featured = FeaturedSection::findOrFail($id);
       return view('admin2.layout.featuredsection.edit',compact('featured'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $req, $id)
{
    $req->validate([
        'left_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'heading' => 'required|string|max:255',
        'subheading' => 'required|string|max:255',
        'accordion_titles' => 'required|array',
        'accordion_contents' => 'required|array',
        'info_keys' => 'required|array',
        'info_values' => 'required|array',
        'info_icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $featured = FeaturedSection::findOrFail($id);

    if($req->hasFile('left_image')){
        $leftImagePath = $req->file('left_image')->store('images','public');
        $featured->left_image = $leftImagePath;
    }

    if($req->hasFile('icon_image')){
        $iconimagePath = $req->file('icon_image')->store('images','public');
        $featured->icon_image = $iconimagePath;
    }

    $featured->heading = $req->heading;
    $featured->subheading = $req->subheading;

    $accordions = collect($req->accordion_titles)->map(function ($title, $i) use ($req) {
        return [
            'title' => $title,
            'content' => $req->accordion_contents[$i],
        ];
    });
    $featured->accordions = json_encode($accordions);

    // ✅ Correct info_table handling
    $infoTable = [];
    foreach ($req->info_keys as $i => $key) {
        $iconPath = null;
        if ($req->hasFile('info_icons') && isset($req->file('info_icons')[$i])) {
            $iconPath = $req->file('info_icons')[$i]->store('icons', 'public');
        } elseif (isset(json_decode($featured->info_table, true)[$i]['icon'])) {
            $iconPath = json_decode($featured->info_table, true)[$i]['icon'];
        }

        $infoTable[] = [
            'key' => $key,
            'value' => $req->info_values[$i],
            'icon' => $iconPath,
        ];
    }
    $featured->info_table = json_encode($infoTable);

    $featured->save();

    return redirect()->route('admin2.featuredsection.index')->with('success', 'Featured Section updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $featured = FeaturedSection::findOrFail($id);
        $featured->delete();
        return redirect()->route('admin2.featured.index')->with('success', 'Featured Section deleted successfully!');
        //
    }
}
