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
                        <a href="{{ route('myProject.show') }}" _ngcontent-lnm-c460="" data-testid="breadcrumb-0" class="text-dark" style="text-decoration: none;">
                            <span _ngcontent-lnm-c460="">My Projects</span>
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        <a _ngcontent-lnm-c460="" data-testid="breadcrumb-0">
                            <span _ngcontent-lnm-c460="">{{ $project->name }}</span>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
    </main>
@endsection
