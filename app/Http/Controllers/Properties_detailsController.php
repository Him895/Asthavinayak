<?php

namespace App\Http\Controllers;

use App\Models\BestDeal;
use App\Models\FeaturedSection;
use App\Models\Property;
use Illuminate\Http\Request;

class Properties_detailsController extends Controller
{    public function showproperties_details()
    {
        $properties = Property::first();

        $bestdeals = BestDeal::all();
         $appartmentDeals = BestDeal::where('type', 'Apartment')->get();

        $villaDeals = BestDeal::where('type', 'Villa')->get();

        $penthouseDeals = BestDeal::where('type', 'Penthouse')->get();

        $infos = FeaturedSection::first();


        return view('properties_details',compact('properties', 'bestdeals','appartmentDeals', 'villaDeals', 'penthouseDeals','infos'));

    }
    //
}
