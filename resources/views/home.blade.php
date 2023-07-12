@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="/assets/css/home.css">

@section('content')
    <main>
        @include('components.home.head_main')
        <div class="container">
            <div class="input-group position-relative">
                <input type="text" id="search-input" value="" class="form-control rounded" placeholder="Search" />
                <i class="bi bi-x clearIcon d-none"></i>
                <button id="search-button" class="btn btn-outline-primary">search</button>
            </div>
            <div class="tab-search">
                <div style="width: 65%; font-size: var(--font-size--body-l); font-weight: var(--font-weight--bold);">Filter</div>
                <a href="{{ route('home') }}" class="text-dark" style="width: 5%;">
                    <i class="bi bi-list-task fs-3 fw-bold"></i>
                </a>
                <a href="" class="tab-items">Newest</a>
                <a href="" class="tab-items">Trending</a>
                <a href="" class="tab-items" style="border-right: 2px solid var(--color-ui--grey-90)!important;">Best rated</a>
            </div>
            <div class="search-index_content__searchResults mt-5">
                @include('layout.sidebar')
                {{-- @include('components.home.main') --}}
            </div>
        </div>
    </main>
@endsection
