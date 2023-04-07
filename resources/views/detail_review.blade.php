@extends('layout.master')
@include('admin.layouts.head_index')
@include('admin.layouts.link_script')

@section('title', 'Review detail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">

@section('content')
    <div class="details">
        <div class="containerInner detailHead">
            <div class="container detailTitle d-flex">
                <div class="inf-1">
                    @if ($product->img_url)
                        <img src="{{ url($product->img_url) }}" alt="">
                    @else
                        <img src="{{ asset('assets/images/default_image.png') }}" alt="">
                    @endif
                </div>
                <div class="inf-2">
                    <h1>{{ $product->name }}</h1>
                    <span style="font-weight: 500;">
                        <i style="color:#879596;">By:</i>
                        <span style="color: blue;">
                            {{ $product->vendor->name }}
                        </span>
                    </span>
                    <div class="inf-category">{{ $product->category->name }}</div>
                    <div class="inf-review d-flex">
                        @include('components.helper.star', ['count_star' => 5, 'class_star' => ''])
                        <span style="margin: 0px 1.5rem; padding: 2px; color: blue; font-weight: 600;">
                            10 reviews
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @if (session('alert'))  
        <div class="alert alert-success" role="alert">  
            {{ session('alert') }}
        </div>  
        @endif
        @if (session('error'))   
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="container mt-5">
            <h3 class="mb-3">Perform a detailed assessment of the cloud service</h3>
            <i>Please perform an assessment of the quality level of the cloud service. There are 5 rating levels: 1: very poor - 2: poor - 3: Normal - 4: Good - 5: Very good</i><br/>
            <i>Your answer will be very important to make the system more complete. Thank you very much for taking the time to rate the service in detail.</i>
            <nav class="mt-2">
                
            </nav>
            <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($product->criterias as $criteria )
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <p class="fs-5 fst-italic">
                                {{ $criteria->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                @foreach ($criteria->children as $child)
                                    <p>{{ $child->name }}</p>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
