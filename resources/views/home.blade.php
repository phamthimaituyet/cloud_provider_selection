@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@section('content')
    <main>
        @include('components.home.head_main')
        <div class="container">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </div>
            <div class="search-index_content__searchResults mt-5">
                @include('layout.sidebar')
                @include('components.home.main')
            </div>
        </div>
    </main>
@endsection
