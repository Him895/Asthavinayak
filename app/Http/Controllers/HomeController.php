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
        $properties = Property::where('type', 'Apartment')->get(); // Fetch properties of type 'Apartment'
        return view('properties', compact('properties')); // Return the view with the properties
    }

    public function villa(){
        $properties = Property::where('type', 'Luxury Villa')->get();
        return view('properties',compact('properties'));
    }
    public function penthouse(){
        $properties = Property::where('type', 'Penthouse')->get();
        return view('properties',compact('properties'));
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

        $properties = Property::all()->take(3); // ✅ fetch properties

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
