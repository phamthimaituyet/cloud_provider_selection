@extends('layout.master')

@section('title', 'Product detail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/project_criteria.css') }}">

@section('content')
    <div class="details">
        @include('components.prod_detail.prod_head')
        <div class="container detailPopup">
            <nav class="pt-36" style="padding-top: 36px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? '' : 'active'}} border-ct" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                    <button class="nav-link {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? 'active' : ''}} border-ct" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ratings ({{ $review_stars->count() }})</button>
                    <button class="nav-link border-ct" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Provider</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? '' : 'show active'}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h1 style="font-weight: 400; color: #0e7f74;">Product Overview</h1>
                    <p class="ellipsis">
                        <?= implode('</br><span class="d-block mt-3"></span>', explode('.', $product->description)) ?>
                    </p>
                    <a target="blank" href="{{ $product->vendor->link }}">See details</a>
                    <h1 class="mt-5" style="font-weight: 400; color: #0e7f74;">ISO Certificate</h1>
                    <p class="mt-3">
                        <a target="blank" href="{{ $product->vendor->link_iso }}">{{ $product->certificate }}</a>
                    </p>
                    <h1 class="mt-5" style="font-weight: 400; color: #0e7f74;">Languages</h1>
                    <p class="mt-3">English</p>
                    <div class="display: none;" style="height: 20%;"></div>
                </div>
                @include('components.prod_detail.review')
                @include('components.prod_detail.provider')
            </div>
        </div>
    </div>
@endsection

@include('components.modal.modal_review')
