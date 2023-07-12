@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/my_project.css">
    <link rel="stylesheet" href="/assets/css/project_criteria.css">

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
                <span class="d-flex ms-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    @if($project->user_id == Auth::user()->id)
                        <h5 class="ms-3">Create the corresponding wishes and criteria for the project</h5>
                        <p class="fst-italic ms-2">(After submitting, the system will suggest the appropriate service provider)</p>
                    @else
                        <h5 class="ms-3">Ask for advice from an expert. <br>
                        Below are the required information for the appropriate service provider for your project {{ $project->name }} of user {{ $project->user->name }}</h5>
                    @endif
                </span>
                <div>
                    @if(!is_null($products))
                        @include('components.project_criteria.show_infor')
                    @else
                        <div>
                            <p class="no-inf">This project has no information</p>
                        </div>
                        <div class="text-center fs-5">
                            <p>Let's create requirements for the project</p>
                        </div>
                        <div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('myProject.createNote', ['id' => $project->id ]) }}">
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="bi bi-plus-lg me-2"></i>Add requirements
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="/assets/js/project_criteria.js"></script>
@endsection
