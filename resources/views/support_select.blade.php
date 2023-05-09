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
            <h1>Please select the criteria you are interested in when choosing a supplier. We will assist you with service providers that fit those criteria.
                <i class="bi bi-patch-question"></i>
            </h1>
            <div class="d-flex mt-5">
                <div class="me-5" style="width: 64%;">
                    <div class="top_product">
                        <img src="{{ asset('assets/images/Cloud-computing-service-providers_Startuptalky.jpg') }}" alt="">
                        <p>Top cloud products of the right provider</p>
                    </div>
                    <h2 class="fst-italic mb-3 mt-5">Top 5 cloud products of the right provider</h2>
                    @include('components.home.main')
                </div>
                <div>
                    <form class="tag_criteria" method="GET" action="">
                        <h5 class="fst-italic mb-3 text-danger tag_criteria_title">
                            <i class="bi bi-chevron-double-right"></i><i class="bi bi-chevron-double-right"></i>
                            Select the criteria in the form
                        </h5>
                        <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu" data-accordion="false">
                            @foreach ($criterias as $criteria )
                                <li class="nav-item has-treeview menu-open">
                                    <a href="#" class="nav-link">
                                        <p class="fs-5 fst-italic">
                                            {{ $criteria->name }}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <div class="nav nav-treeview ms-5" style="display: block;">
                                        <?php $childs = in_array($criteria->name, ['Cost', 'Capability']) ? [$criteria] : $criteria->children ?>
                                        @foreach ($childs as $child)
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" {{ in_array($child->id, $request) ? 'checked' : '' }} value="{{ $child->id }}" name="{{ __('criteria_id_' . $child->id) }}" id="{{ __('flexCheckDefault_' . $child->id) }}">
                                                <label class="form-check-label" for="{{ __('flexCheckDefault_' . $child->id) }}">{{ $child->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
