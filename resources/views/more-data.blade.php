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
                        <h3 class="font-bold text-3xl"><span class="todays-sky">16.22</span></h3>
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
                        <h3 class="font-bold text-3xl"><span class="todays-temp">27</span>°C</h3>
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
                    <input type="text" readonly class="from yearpicker shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="{{ date('Y') }}">
                    <span class="text-strong"> To </span>
                    <input type="text" readonly class="to yearpicker shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="{{ date('Y') }}">
                </div>

                <div class="p-5 row">
                    <canvas id="solar_irradiance" class="chartjs"></canvas>
                </div>
                <div class="p-5 row">
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="ALLSKY_SFC_UV_INDEX" checked>
                        <label for="ALLSKY_SFC_UV_INDEX">Sky Surface UV Index (ALLSKY_SFC_UV_INDEX)</label>
                    </div>
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="ALLSKY_SFC_UVA" checked>
                        <label for="ALLSKY_SFC_UVA">Sky Surface UVA Irradiance (ALLSKY_SFC_UVA)</label>
                    </div>
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="ALLSKY_SFC_UVB">
                        <label for="ALLSKY_SFC_UVB">Sky Surface UVB Irradiance (ALLSKY_SFC_UVB)</label>
                    </div>
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="T2M">
                        <label for="T2M">Temperature at 2 Meters (T2M)</label>
                    </div>
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="CLRSKY_DAYS">
                        <label for="CLRSKY_DAYS">Clear Sky Day (CLRSKY_DAYS)</label>
                    </div>
                    <div>
                        <input type="checkbox" class="solar-irradiance-filter" value="CLOUD_AMT">
                        <label for="CLOUD_AMT">Cloud Amount (CLOUD_AMT)</label>
                    </div>

                </div>

            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Forecasted Solar Irradiance</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-0"), {
                            "type": "line",
                            "data": {
                                "labels": ["January", "February", "March", "April", "May", "June", "July", "August"],
                                "datasets": [{
                                    "label": "Solar Irradiance",
                                    "data": [65, 59, 80, 81, 56, 55, 40, 50],
                                    "fill": false,
                                    "borderColor": `rgb(${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)})`,
                                    "lineTension": 0.5
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
@include("layouts.bottom-navbar")

@endsection
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/chart-data.js') }}"></script>
    <script type="text/javascript">
        $('.yearpicker').datepicker({
            format: "yyyy",
            viewMode: "year", 
            minViewMode: "year",
            startDate: new Date('2015'),
            endDate: new Date('2021')
        });
    </script>
@endpush