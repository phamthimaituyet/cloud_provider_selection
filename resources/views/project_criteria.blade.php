@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my_project.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/project_criteria.css') }}">

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
                <div class="flex-grow-1 p-3 min-height-0">
                    <div class="flexbox solution h-100">
                        <div class="flexbox-scroll">
                            @include('components.project_criteria.add_criteria')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.project_criteria.form_add_criteria')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('assets/js/project_criteria.js') }}"></script>
@endsection
