@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@section('content')
    <main>
        @include('components.home.head_main')
        <div class="container">
            <form action="{{ route('home') }}" class="input-group" method="GET">
                <input type="text" name="q" value="{{ app('request')->input('q') ?? '' }}" class="form-control rounded" placeholder="Search" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </form>
            <div class="search-index_content__searchResults mt-5">
                @include('layout.sidebar')
                @include('components.home.main')
            </div>
        </div>
    </main>
@endsection
