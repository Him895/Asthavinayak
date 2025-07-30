<?php

namespace App\Http\Controllers;

use App\Models\BestDeal;
use App\Models\Contact;
use App\Models\FeaturedSection;
use App\Models\HomeBanner;
use App\Models\Property;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function apartment(){
    $properties = Property::where('type', 'Apartment')->paginate(2);
    return view('properties', compact('properties'));
}

public function villa(){
    $properties = Property::where('type', 'Luxury Villa')->paginate(2);
    return view('properties', compact('properties'));
}

public function penthouse(){
    $properties = Property::where('type', 'Penthouse')->paginate(2);
    return view('properties', compact('properties'));
}



    public function index()
    {
        $homeBanners = HomeBanner::all();
        $featuredsection = FeaturedSection::first();

        $bestdealsection = BestDeal::first(); // for heading/subheading

        $videosection = Video::first();

        $appartmentDeals = BestDeal::where('type', 'Apartment')->get();

        $villaDeals = BestDeal::where('type', 'Villa')->get();

        $penthouseDeals = BestDeal::where('type', 'Penthouse')->get();

$properties = Property::paginate(2);

        $contact = Contact::first();



        // dd($properties); // Debugging line to check the properties

        return view('home', compact(
            'homeBanners',
            'featuredsection',
            'videosection',
            'bestdealsection',
            'appartmentDeals',
            'villaDeals',
            'penthouseDeals','properties','contact',
        ));
    }
    //
}
