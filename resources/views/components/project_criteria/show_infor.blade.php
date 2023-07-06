<div class="mt-5 ms-3">
    <div class="row">
        <h3 class="view-title col-10">Suggestion Service</h3>
        @if($project->user_id == Auth::user()->id)
            <a href="{{ route('myProject.createNote', ['id' => $project->id ]) }}" class="col-2">
                <button type="button" class="btn btn-outline-primary">
                    <i class="bi bi-plus-lg me-2"></i>Add requirements
                </button>
            </a>
        @endif
    </div>
    <div class="row mb-2 mt-4">
        @foreach ($products as $product)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        @if($product->img_url)
                            <img src={{ asset($product->img_url) }} alt="" >
                        @else
                            <img src={{ asset('assets/images/default_image.png') }} alt="" style="width: 200px; height: 209px;">
                        @endif
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4 class="name-product">{{ $product->name }}</h4>
                        <strong class="d-inline-block mb-2 text-primary">By: {{ $product->vendor->name }}</strong>
                        <div class="mb-1 text-muted">
                            @include('components.helper.star', ['count_star' => round($product->ratings_avg_number_star), 'class_star' => 'col-5'])
                            @include('components.helper.star', ['count_star' => (5 - round($product->ratings_avg_number_star)), 'class_star' => 'col-5 white'])
                            <a href="{{ route('show', ['id' => $product->id, 'type' => 'reviews']) }}" class="shared-item_cards-author_category_component__link">
                                <span style="padding: 2px; color: blue; font-weight: 600;">
                                    {{ $product->commnets->count() }} reviews
                                </span>
                            </a>
                        </div>
                        <p class="card-text mb-auto">{{ $product->description }}</p>
                        <a href="{{ route('show', ['id' => $product->id])}}" class="stretched-link">Continue reading</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <h3 class="view-title col-10">Project information</h3> 
        @if($project->user_id == Auth::user()->id)
            <form action="{{ route('myProject.share', ['id' => $project->id]) }}" method="POST" class="col-2">
                @csrf
                <button type="submit" class="btn btn-outline-primary d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Share information for experts to get advice.">
                    <i class="bi bi-reply-all-fill me-2"></i>{{ $project->share ? 'Shared information' : 'Share information' }}
                </button>
            </form>
        @endif
    </div>
    @foreach ($project->notes as $note)
        <div class="mt-4 d-flex parent-all-inf">
            <div class="all-inf">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <p class="fs-5 ms-2">{{ $note->note }}</p>
                </div>
                <ul class="list-inf ms-5">
                    @foreach ($note->questions as $question)
                        <li>
                            <p class="ms-3" style="font-size: 18px;">{{ $question->question }}</p>
                        </li>
                        @foreach ($question->criterias as $criteria)
                        <li class="ms-5">
                            <p class="ms-3" style="font-size: 18px;">Desired Criteria: {{ $criteria->name }}</p>
                        </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <div class="edit-update-inf">
                <a href="{{ route('myProject.editNote', ['project_id' => $project->id, 'note_id' => $note->id]) }}" class="me-1"><i class="bi bi-pencil-square fs-5"></i></a>
                <a class="text-danger me-2" data-bs-toggle="modal" data-bs-target="{{ '#deleteModal' . $note->id }}"><i class="bi bi-trash3-fill fs-5"></i></a>
            </div>
            @include('components.modal.modal_delete', ['project' => $project, 'note' => $note, 'id' => $note->id])
        </div>
    @endforeach
    @if($project->share)
        <h3 class="view-title mt-5">Expert advice</h3>
        <div class="mt-3">
            <form action="{{ route('myProject.message', ['id' => $project->id ]) }}" method="POST">
                @csrf
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3" src={{ (Auth::user()->role == 3) ? asset('vendors/dist/img/user2-160x160.jpg') : asset($project->user->avatar) }} alt="avatar" width="40" height="40">
                        <div class="form-outline w-100">
                        <label class="form-label fs-5" for="textAreaExample" style="margin-left: 0px;">Message</label>
                        <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;" name="content"></textarea>
                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 60px;"></div><div class="form-notch-trailing"></div></div></div>
                    </div>
                    <div class="mt-2 w-100 text-end">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
            @foreach ($message as $item)
                <div class="card-body">
                    <div class="d-flex <?= ($item->user->role == 3) ? 'ps-end' : 'ps-start' ?> align-items-center">
                        <img class="rounded-circle shadow-1-strong me-3" src={{ ($item->user->role == 3) ? asset('vendors/dist/img/user2-160x160.jpg') : asset($project->user->avatar) }} alt="avatar" width="60" height="60">
                        <div>
                            <p class="text-muted small mb-0 fs-4">{{ $item->user->name }}</p>
                            <p class="mb-1">{{ $item->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    <p class="mt-3 mb-4 pb-2 <?= ($item->user->role == 3) ? 'text-end' : 'text-start' ?>">
                        {{ $item->content }}
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</div>

