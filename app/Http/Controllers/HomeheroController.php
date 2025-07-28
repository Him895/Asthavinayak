<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner; // ✅ Correct Model Use
use App\Models\Message;

class HomeheroController extends Controller
{   public function hero(){
        $banners = HomeBanner::all();
        return view('admin2.layout.herosection.herosection', compact('banners'));
    }

    public function index(){
        $banners = HomeBanner::all();
        $headerMessages = Message::latest()->take(5)->get();

        return view('admin2.layout.herosection.herosection', compact('banners','headerMessages'));
    }

    public function fetchtable(){
        $banners = HomeBanner::all();
        return view('admin2.layout.herosection.herotable', compact('banners'));
    }
    public function store(Request $req)
    {
        $req->validate([
            'location' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($req->hasFile('background_image')) {
            $imagePath = $req->file('background_image')->store('images', 'public');
        }

        HomeBanner::create([
            'location' => $req->location,
            'country' => $req->country,
            'title_line1' => $req->title_line1,
            'title_line2' => $req->title_line2,
            'background_image' => $imagePath,

        ]);

       return redirect()->route('admin2.hero.index')->with('success', 'Banner added successfully!');

    }

    // Show the edit form
public function edit($id)
{
    $banner = HomeBanner::findOrFail($id);
    return view('admin2.layout.herosection.edit', compact('banner'));
}

// Update the record
public function update(Request $req, $id)
{
    $req->validate([
        'location' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'title_line1' => 'required|string|max:255',
        'title_line2' => 'required|string|max:255',
        'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $banner = HomeBanner::findOrFail($id);

    if ($req->hasFile('background_image')) {
        $imagePath = $req->file('background_image')->store('images', 'public');
        $banner->background_image = $imagePath;
    }

    $banner->update([
        'location' => $req->location,
        'country' => $req->country,
        'title_line1' => $req->title_line1,
        'title_line2' => $req->title_line2,
        'background_image' => $banner->background_image,
    ]);

    return redirect()->route('admin2.hero.index')->with('success', 'Banner updated!');
}

// Delete the record
public function destroy($id)
{
    $banner = HomeBanner::findOrFail($id);
    $banner->delete();

    return redirect()->route('admin2.hero.index')->with('success', 'Banner deleted!');
}

}
