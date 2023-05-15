@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my_project.css') }}">

@section('content')
    <main>
        <div class="container mt-5">
            <div class="flex-grow-1 d-flex flex-column">
                <ul class="bread-crumb mb-3">
                    <li>
                        <a _ngcontent-lnm-c460="" data-testid="breadcrumb-0">
                            <span _ngcontent-lnm-c460="">My Projects</span>
                        </a>
                    </li>
                </ul>
                <form action="" class="input-group ms-3" method="GET">
                    <input type="text" name="q" value="{{ app('request')->input('q') ?? '' }}" class="form-control rounded" placeholder="Search" />
                    <button type="submit" class="btn btn-outline-primary">search</button>
                </form>
                <div class="flex-grow-1 p-3 min-height-0">
                    <div class="flexbox solution h-100">
                        <div class="flexbox-scroll">
                            @include('components.my_project.project')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
