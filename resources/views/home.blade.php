@extends('layouts.app')
@section('page-body')
<div class="w-full px-4 md:px-0 md:mt-8 text-gray-800 leading-normal">
    <div class="m-10 row">
        <input type="text" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $location }}" readonly />
    </div>
    <div class="flex flex-row flex-wrap flex-grow mt-2">
        <div class="w-full md:w-1/2 p-3 float-right">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="p-5">
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                          <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-amber-600 bg-amber-200">
                              You can harvest <span class="">90%</span> of energy from the sun!
                            </span>
                          </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-amber-200">
                          <div style="width: 90%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Graph Card-->
        </div>
        <div class="w-full md:w-1/2 p-3 float-right">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Solar Irradiance Map</h5>
                </div>
                <div class="p-5">
                    <div>
                        <img src="{{ asset('images/heatmap.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        @include('layouts.bottom-navbar')
@endsection