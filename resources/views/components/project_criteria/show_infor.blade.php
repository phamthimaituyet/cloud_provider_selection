<div class="mt-5 ms-3">
    <div class="row">
        <div class="row">
            <h3 class="view-title col-10">General information</h3>
            @if($project->user_id == Auth::user()->id)
                <a href="{{ route('myProject.createNote', ['id' => $project->id ]) }}" class="col-2">
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-plus-lg me-2"></i>Add requirements
                    </button>
                </a>
            @endif
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0" style="font-weight: 500;">Requirements</p>
                                <h3 class="m-0">{{ $project->notes->count() }}</h3>
                                <p class="mb-0 text-truncate text-muted">
                                    Total number of requirements created
                                </p>
                            </div>
                            <div class="col-auto align-self-center">
                                <i class="bi bi-r-circle fs-3"></i>
                            </div>
                        </div>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">                                                
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold" style="font-weight: 500;">Questions</p>
                                <h3 class="m-0">
                                    {{ count($questions_id) }}
                                </h3>
                                <p class="mb-0 text-truncate text-muted">Total number of questions created</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <i class="bi bi-question-circle fs-3"></i>
                            </div> 
                        </div>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">                                                
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold" style="font-weight: 500;">Criterias</p>
                                <h3 class="m-0">{{ count($criterias_id) }}</h3>
                                <p class="mb-0 text-truncate text-muted">Total number of applicable criteria</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <i class="bi bi-c-circle fs-3"></i>
                            </div> 
                        </div>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                            
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
                <ul class="list-unstyled faq-qa ms-5 mt-3">
                    @foreach ($note->questions as $key => $question)
                        <li class="my-4">
                            <h5 class="ms-3">{{ $key + 1 }}. {{ $question->question }}</h5>
                        </li>
                        <span class="text-muted ms-5 fs-5">Desired Criteria: </span>
                        @foreach ($question->criterias as $key => $criteria)
                            <span class="text-muted fs-5">{{ $key ? '-' : '' }} {{ $criteria->name }}</span>
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
        <form action="{{ route('myProject.saveLog', ['id' => $project->id]) }}" method="POST">
            @csrf
            <h3 class="view-title mt-5">Suggestion Service</h3>
            <div class="row mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="col-11 d-flex align-items-center" style="color: goldenrod;">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <p>Make sure you have no edits and save the final result.</p>
                </div>
                <button type="submit" class="btn btn-outline-primary col-1">
                    <i class="bi bi-bookmark-check fs-5"></i> Save
                </button>
            </div>
            <div class="row mb-2 mt-4">
                @foreach ($products as $product)
                    <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-auto d-none d-lg-block">
                                @if($product->img_url)
                                    <img src={{ '/' . ($product->img_url) }} alt="" style="width: 200px; height: 209px;">
                                @else
                                    <img src="/assets/images/default_image.png" alt="" style="width: 200px; height: 209px;">
                                @endif
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <h4 class="name-product">
                                    {{ $product->name }}
                                </h4>
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
        </form>
        @if($project->share)
        <h3 class="view-title mt-5">Expert advice</h3>
        <div class="mt-3">
            <form action="{{ route('myProject.message', ['id' => $project->id ]) }}" method="POST">
                @csrf
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3" src={{ (Auth::user()->role == 3) ? "/vendors/dist/img/user2-160x160.jpg" : ($project->user->avatar ? '/' . $project->user->avatar : '/storage/images/profile.jpg') }} alt="avatar" width="40" height="40">
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
                        <img class="rounded-circle shadow-1-strong me-3" src={{ ($item->user->role == 3) ? '/vendors/dist/img/user2-160x160.jpg' : ($project->user->avatar ? '/' . $project->user->avatar : '/storage/images/profile.jpg') }} alt="avatar" width="60" height="60">
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
</div>

