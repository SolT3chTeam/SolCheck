@extends('layouts.app')
@section('page-body')
<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
    <form action="{{ url('/solar-dashboard') }}" method="GET">
        <div class="m-10 row">
            <input type="hidden" name="latitude" value="14.4506">
            <input type="hidden" name="longitude" value="120.9828">
            <h2 class="text-center mb-5">Where in the world are you?</h2>
            <input type="text" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5" value="{{ old('location') }}" required>
            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded float-right">Check my Solar!</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/location.js') }}"></script>
@endpush