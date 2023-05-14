@extends('layout.master')
@include('admin.layouts.link_script')

@section('title', 'Service selection support')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/support.css') }}">

@section('content')
    <main>
        @include('components.home.head_main')
        <div class="container mt-5">
            <h1 class="fst-italic mb-3">Top 5 cloud products of the right provider</h1>
            <div class="d-flex mt-5">
                <div class="me-5" style="width: 80%;">
                    <div class="top_product mb-5">
                        <img src="{{ asset('assets/images/Cloud-computing-service-providers_Startuptalky.jpg') }}" alt="">
                        <p>Top cloud products of the right provider</p>
                    </div>
                    <div>
                        <p class="mb-3 fs-4">The system gives the top 5 suitable services that are calculated and analyzed based on user-supplied data.</p>
                    </div>
                    @include('components.home.main')
                </div>
                <div>
                    <div class="tag_criteria" method="GET" action="">
                        <h5 class="fst-italic mb-3 text-danger tag_criteria_title">
                            Outstanding experience
                        </h5>
                        <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">Suggest services tailored to each project requirement</a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('home') }}">Information about cloud services of providers</a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">Suggest services tailored to each project requirement</a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">Suggest services tailored to each project requirement</a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">Suggest services tailored to each project requirement</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
