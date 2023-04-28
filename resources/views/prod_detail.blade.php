@extends('layout.master')

@section('title', 'Product detail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">

@section('content')
    <div class="details">
        <div class="containerInner detailHead">
            <div class="container detailTitle d-flex">
                <div class="inf-1">
                    @if ($product->img_url)
                        <img src="{{ $product->img_url }}" alt="">
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
        <div class="container detailPopup">
            <nav class="pt-36">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active border-ct" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                    <button class="nav-link border-ct" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ratings</button>
                    <button class="nav-link border-ct" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Provider</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h1 style="font-weight: 100; color: #0e7f74;">Product Overview</h1>
                    <p class="ellipsis">{{ $product->description }}</p>
                    <a target="blank" href="{{ $product->vendor->link }}">Xem chi tiết</a>
                </div>
                @include('components.prod_detail.review')
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">ghkn</div>
            </div>
        </div>
    </div>
@endsection

@include('components.modal.modal_review')
