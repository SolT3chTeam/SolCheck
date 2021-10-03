
@extends('layouts.app')
@section('page-body')

<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
    <!--Console Content-->
    <div class="flex flex-wrap">
        <div class="w-full h-full p-3">
            <!--Graph Card-->
            @if(session('success'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Your submission is complete!</p>
                            <p class="text-sm">Feel free to submit more data.</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Your submission failed to submit!</p>
                            <p class="text-sm">Please try again or contact the administrator.</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Share Your Data!</h5>
                    <small>Submit solar-related data and contribute to the effort to bring solar power to the masses!</small>
                </div>
                <div class="p-5">
                    <form method="POST" action="{{ url('/compare-with-us') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5 row">
                            <label for="name">Solar Irridance</label>
                            <input type="text" name="solar_irridance" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('solar_irridance') }}">
                        </div>
                        <div class="mb-5 row">
                            <label for="name">Cloud Cover %</label>
                            <input type="text" name="cloud_cover" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('cloud_cover') }}">
                        </div>
                        <div class="mb-5 row">
                            <label for="temperature">Temperature °C</label>
                            <input type="text" name="temperature" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('temperature') }}">
                        </div>
                        <div class="mb-5 row">
                            <label for="humidity">Humidity</label>
                            <input type="text" name="humidity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('humidity') }}">
                        </div>
                        <div class="mb-5 row">
                            <label for="wind_speed">Wind Speed</label>
                            <input type="text" name="wind_speed" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('wind_speed') }}">
                        </div>
                        
                        <div class="mb-5 row">
                            <label for="pm_concentration">PM 2.5 Concentration</label>
                            <input type="text" name="pm_concentration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('pm_concentration') }}">
                        </div>
                        <div class="mb-5 row">
                            <label for="co2_concentration">CO2 Concentration</label>
                            <input type="text" name="co2_concentration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('co2_concentration') }}">
                        </div>


                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Submit</button>
                    </form>
                </div>
            </div>
            <!--/Graph Card-->
        </div>
    </div>
</div>
@include("layouts.bottom-navbar")

@endsection
@push('scripts')
<script src="{{ asset('js/chart-data.js') }}"></script>
@endpush