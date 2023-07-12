@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/my_project.css">
    <link rel="stylesheet" href="/assets/css/project_criteria.css">

@section('content')
    <main>
        <div class="container mt-5">
            <div class="flex-grow-1 d-flex flex-column">
                <ul class="bread-crumb mb-3">
                    <li>
                        <a href="{{ route('myProject.show') }}" _ngcontent-lnm-c460="" data-testid="breadcrumb-0" class="text-dark text-decoration-none">
                            <span _ngcontent-lnm-c460="">My Projects</span>
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('myProject.showProduct', ['id' => $project->id ]) }}" _ngcontent-lnm-c460="" data-testid="breadcrumb-0" class="text-dark text-decoration-none">
                            <span _ngcontent-lnm-c460="">{{ $project->name }}</span>
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        <a _ngcontent-lnm-c460="" data-testid="breadcrumb-0">
                            <span _ngcontent-lnm-c460="">Update requirements</span>
                        </a>
                    </li>
                </ul>
                <div class="ms-3 d-flex me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>  
                    <h5 class="mx-3">List of some reference questions</h5>  
                    <span>
                        <a href="" class="text-decoration-none fw-bold" style="font-size: 18px;">Click here</a>
                    </span>
                </div>
            </div>
            <div class="mt-5">
                @include('components.project_criteria.form_edit_criteria')
            </div>

        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="/assets/js/edit_note.js"></script>
@endsection
