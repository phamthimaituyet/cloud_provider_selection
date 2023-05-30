@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@section('content')
    <main>
        @include('components.home.head_main')
        <div class="container">
            <div class="input-group position-relative">
                <input type="text" id="search-input" value="" class="form-control rounded" placeholder="Search" />
                <i class="bi bi-x clearIcon d-none"></i>
                <button id="search-button" class="btn btn-outline-primary">search</button>
            </div>
            <div class="search-index_content__searchResults mt-5">
                @include('layout.sidebar')
                {{-- @include('components.home.main') --}}
            </div>
        </div>
    </main>
@endsection
