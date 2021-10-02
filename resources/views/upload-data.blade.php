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
                            <p class="font-bold">Data uploaded to the database successfully!</p>
                            <p class="text-sm">Feel free to upload more.</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Upload Data</h5>
                    <small>CSV and Spreadsheet files (.xlsx, .xls) are supported.</small>
                </div>
                <div class="p-5">
                    <form method="POST" action="{{ url('/upload-data') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5 row">
                            <label for="name">Data Name</label>
                            <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-5 row">
                            <label for="name">Data File</label>
                            <input type="file" name="file" accept=".csv,.xlsx,.xls" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Submit</button>
                    </form>
                </div>
            </div>
            <!--/Graph Card-->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/chart-data.js') }}"></script>
@endpush