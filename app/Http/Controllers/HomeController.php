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
        $dailyUvIndex = [];
        $dailyTemperatureAt2Meters = [];
        $latestUvIndex  = 0;
        $latestTemperatureAt2Meters = 0;

        try{
            $dailyUvIndex = Http::get('https://power.larc.nasa.gov/api/temporal/daily/point', [
                'parameters' => "ALLSKY_SFC_UV_INDEX",
                'community' => "RE",
                'longitude' => "120.9828",
                'latitude' => "14.4506",
                'start' => "20210101",
                'end' => "20210531",
                'form' => "JSON",
            ])->throw()->json();
    
            $dailyTemperatureAt2Meters = Http::get('https://power.larc.nasa.gov/api/temporal/daily/point', [
                'parameters' => "T2M",
                'community' => "SB",
                'longitude' => "120.9828",
                'latitude' => "14.4506",
                'start' => "20210830",
                'end' => "20210831",
                'form' => "JSON",
            ])->throw()->json();

            $latestUvIndex = end($dailyUvIndex['properties']['parameter']['ALLSKY_SFC_UV_INDEX']);
            $latestTemperatureAt2Meters = end($dailyTemperatureAt2Meters['properties']['parameter']['T2M']);
        } catch(\Exception $e){
            report($e);
        }

        return view('home', compact('dailyUvIndex', 'latestUvIndex', 'latestTemperatureAt2Meters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
