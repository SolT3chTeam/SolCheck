@extends('layouts.app')
@section('page-body')
<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
    <input type="hidden" class="latitude" name="latitude">
    <input type="hidden" class="longitude" name="longitude">
    <!--Console Content-->
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-white border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-500">Today's Sky Irradiance</h5>
                        <h3 class="font-bold text-3xl"><span class="todays-sky">{{ $latestUvIndex ?? 0 }}</span></h3>
                        <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-white border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-500">Today's Temperature (at 2 Meters)</h5>
                        <h3 class="font-bold text-3xl"><span class="todays-temp">{{ $latestTemperatureAt2Meters ?? 0 }}</span>°C</h3>
                        <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <!--Divider-->
    <hr class="border-b-2 border-gray-400 my-8 mx-4">

    <div class="flex flex-row flex-wrap flex-grow mt-2">
        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Solar Irradiance In Your Location</h5>
                </div>
                <div class="p-5 row">
                    <canvas id="solar_irradiance" class="chartjs"></canvas>
                </div>
                <div class="p-5 row">

                </div>

            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                    new Chart(document.getElementById("chartjs-0"), {
                        "type": "line",
                        "data": {
                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                            "datasets": [{
                                "label": "Views",
                                "data": [65, 59, 80, 81, 56, 55, 40],
                                "fill": false,
                                "borderColor": "rgb(75, 192, 192)",
                                "lineTension": 0.1
                            }]
                        },
                        "options": {}
                    });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

    </div>
    <!--/ Console Content-->
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/chart-data.js') }}"></script>
@endpush