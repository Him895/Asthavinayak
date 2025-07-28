<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{     public function index()
    {
        $videos = Video::first();
        $headerMessages = Message::latest()->take(5)->get();

        return view('admin2.layout.videosection.videosection',compact('videos','headerMessages'));
    }

    public function store(request $req)
    {
        $req->validate([
            'main_heading' => "required|string",
            'background_image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            'video_file' => "required|file|mimes:mp4,mov,avi,flv,mkv|max:20480", // 20MB max
        ]);

        $imagePath = $req->file('background_image')->store('images','public');

        $videoPath = $req->file('video_file')->store('videos','public');

        Video::create([
            'main_heading' => $req->main_heading,
            'background_image' => $imagePath,
            'video_file' => $videoPath,
        ]);

        return redirect()->back()->with('success', 'Video added successfully');
    }
    //
}
