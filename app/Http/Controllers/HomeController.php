<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('location');
    }

    public function showDashboard(Request $request){
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $location = $request->location;
        
        return view('home', compact('location', 'latitude', 'longitude'));
    }

    public function showMoreData(){
        return view('more-data');
    }
}
