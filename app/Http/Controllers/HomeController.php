<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\SolarDataRequest;
use App\Models\SolarData;

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

    public function compareWithUs(){
        return view('compare-with-us');
    }

    public function saveSolarData(SolarDataRequest $request){
        try
        {
            SolarData::create($request->all());

            session()->flash('success', "Data successfully saved to the database!");

            return redirect('/compare-with-us');
        } 
        catch (Exception $exception)
        {
            session()->flash('error', $exception);
            return redirect()->back();
        }
    }
}
