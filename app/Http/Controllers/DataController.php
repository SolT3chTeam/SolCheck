<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Data;
use App\Models\SolarData;
use App\Http\Requests\DataRequest;
use App\Models\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function saveApiDataToDatabase(Request $request){
        try{
            $apiRequest = Http::get($request->url, [
                'parameters' => $request->parameters,
                'community' => $request->community,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'start' => $request->start,
                'end' => $request->end,
                'form' => "JSON",
            ])->throw()->json();

            Data::updateOrCreate([
                'name' => $request->parameters,
            ],[
                'name' => $request->parameters,
                'data' => json_encode($apiRequest)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Successfully saved API data.',
                'data'    => json_encode($apiRequest)
            ]);
        } catch (Exception $e) {
            report($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function create(){
        return view('upload-data');
    }

    public function store(Request $request){
        try
        {
            $csvData = Excel::toCollection(new DataImport, $request->file('file'));
            $totalData = [];

            Data::updateOrCreate([
                'name' => $request->name,
            ],[
                'name' => $request->name,
                'data' => json_encode($csvData[0])
            ]);

            session()->flash('success', "Data successfully saved to the database!");

            return redirect('/upload-data');
        } 
        catch (Exception $exception)
        {
            session()->flash('error', $exception);
            return redirect()->back();
        }
    }

    public function getData(Request $request){
        $data = Data::where('name', $request->name)->first() ?? [];
        return $data['data'];
    }

    public function getApiData(Request $request){
        try{
            $apiRequest = Http::get($request->url)->throw()->json();

            return response()->json([
                'success' => true,
                'message' => 'Successfully retrieved API data.',
                'data'    => json_encode($apiRequest)
            ]);
        } catch (Exception $e) {
            report($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}
