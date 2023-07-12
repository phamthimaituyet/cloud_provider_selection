@if(Auth::user()->role == 3)
    <div class="row">
        @foreach ($myProjects as $myProject)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="businessContainer center-button">
                    <a href="{{ route('myProject.showProduct', ['id' => $myProject->id]) }}" class="text-dark" style="text-decoration: none;">
                        <div class="d-flex align-items-end">
                            <img class="d-block mt-2 ms-3" src="/assets/images/project2.svg">
                            <p class="ms-3 fw-bold name-project">{{ $myProject->name }}</p>
                        </div>
                        <div class="mt-5 ms-3">
                            <p>Shared by: {{ $myProject->user->name }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6" data-bs-toggle="modal" data-bs-target="#myProject">
            <div class="businessContainer center-button">
                <i class="bi bi-plus-lg icon icon-plus-b24"></i>
                <span class="text fw-bold">
                    <span>Project</span>
                </span>
            </div>
        </div>
        @foreach ($myProjects as $myProject)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="businessContainer center-button">
                    <div class="mt-3" style="float: right;">
                        <a class="me-1" data-bs-toggle="modal" data-bs-target="{{ '#editMyProject' . $myProject->id }}"><i class="bi bi-pencil-square fs-5"></i></a>
                        <a class="text-danger me-2" data-bs-toggle="modal" data-bs-target="{{ '#deleteModal' . $myProject->id }}"><i class="bi bi-trash3-fill fs-5"></i></a>
                    </div>
                    <a href="{{ route('myProject.showProduct', ['id' => $myProject->id]) }}" class="text-dark" style="text-decoration: none;">
                        <div class="d-flex align-items-end">
                            <img class="d-block mt-2 ms-3" src="/assets/images/project2.svg">
                            <p class="ms-3 fw-bold name-project">{{ $myProject->name }}</p>
                        </div>
                        <div class="mt-5 ms-3">
                            <p>Last change</p>
                            <p class="col-8">{{ $myProject->created_at->format('d.m.Y') }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @include('components.modal.modal_delete', ['id' => $myProject->id])
            @include('components.modal.modal_editMyProject', ['id' => $myProject->id])
        @endforeach
    </div>
@endif

@include('components.modal.modal_myProject')
