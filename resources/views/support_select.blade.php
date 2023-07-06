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
                        <img src="{{ asset('assets/images/Cloud-computing-service-providers_Startuptalky.jpg') }}"
                            alt="">
                        <p>Top cloud products of the right provider</p>
                    </div>
                    <div>
                        <p class="mb-3 fs-4">The system gives the top 5 suitable services that are calculated and analyzed
                            based on user-supplied data.</p>
                    </div>
                    @include('components.home.main')
                </div>
                <div>
                    <div class="tag_criteria" method="GET" action="">
                        <h5 class="fst-italic mb-3 text-danger tag_criteria_title">
                            Outstanding experience
                        </h5>
                        <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item" style="font-size: 20px;">
                                <a href="{{ route('home') }}">
                                    <i class="bi bi-info-circle"></i> Information about cloud services of providers
                                </a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">
                                    Suggest services tailored to each project requirement
                                </a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('compareProduct') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 49 49" fill="none">
                                        <g clip-path="url(#clip0_5_2549)">
                                            <path
                                                d="M39.5 10.3572H26.0975V5.85718H23.0975V10.3572H9.5L0.5 23.8572C0.5 26.2441 1.44821 28.5333 3.13604 30.2211C4.82387 31.909 7.11305 32.8572 9.5 32.8572C11.8869 32.8572 14.1761 31.909 15.864 30.2211C17.5518 28.5333 18.5 26.2441 18.5 23.8572L11.5025 13.3572H23.105V39.6072H9.5V42.6072H39.5V39.6072H26.0975V13.3572H37.4975L30.5 23.8572C30.5 26.2441 31.4482 28.5333 33.136 30.2211C34.8239 31.909 37.1131 32.8572 39.5 32.8572C41.8869 32.8572 44.1761 31.909 45.864 30.2211C47.5518 28.5333 48.5 26.2441 48.5 23.8572L39.5 10.3572ZM9.5 15.7647L14.8925 23.8572H4.1075L9.5 15.7647ZM9.5 29.8572C8.44782 29.8561 7.41443 29.5784 6.50349 29.0518C5.59255 28.5252 4.83609 27.7684 4.31 26.8572H14.69C14.1639 27.7684 13.4075 28.5252 12.4965 29.0518C11.5856 29.5784 10.5522 29.8561 9.5 29.8572ZM44.8925 23.8572H34.1075L39.5 15.7647L44.8925 23.8572ZM39.5 29.8572C38.4478 29.8561 37.4144 29.5784 36.5035 29.0518C35.5925 28.5252 34.8361 27.7684 34.31 26.8572H44.69C44.1639 27.7684 43.4075 28.5252 42.4965 29.0518C41.5856 29.5784 40.5522 29.8561 39.5 29.8572Z"
                                                fill="#1087d0" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_5_2549">
                                                <rect width="48" height="36.75" fill="white"
                                                    transform="translate(0.5 5.85718)" />
                                            </clipPath>
                                        </defs>
                                    </svg> Observing and comparing 2 cloud services (providers)
                                </a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('home') }}">
                                    <i class="bi bi-search"></i> Search easily for cloud services by given criteria.
                                </a>
                            </li>
                            <li class="nav-item mt-5" style="font-size: 20px;">
                                <a href="{{ route('myProject.show') }}">
                                    <img class="" src={{ asset("assets/images/project2.svg") }} style="color: #1087d0"/>
                                    Suggest services tailored to each project requirement
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
