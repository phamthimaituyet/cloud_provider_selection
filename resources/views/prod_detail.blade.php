@extends('layout.master')

@section('title', 'Product detail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">

@section('content')
    <div class="details">
        @include('components.prod_detail.prod_head')
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
            <nav class="pt-36" style="padding-top: 36px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? '' : 'active'}} border-ct" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                    <button class="nav-link {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? 'active' : ''}} border-ct" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ratings ({{ $reviews->count() }})</button>
                    <button class="nav-link border-ct" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Provider</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? '' : 'show active'}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h1 style="font-weight: 100; color: #0e7f74;">Product Overview</h1>
                    <p class="ellipsis">{{ $product->description }}</p>
                    <a target="blank" href="{{ $product->vendor->link }}">Xem chi tiết</a>
                    <div class="display: none;" style="height: 20%;"></div>
                </div>
                @include('components.prod_detail.review')
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">ghkn</div>
            </div>
        </div>
    </div>
@endsection

@include('components.modal.modal_review')
