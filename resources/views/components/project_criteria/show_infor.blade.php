<div class="mt-3">
    <h3 class="view-title">Suggestion Service</h3>
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
    <h3 class="view-title mt-5">Project information</h3>
    @foreach ($projectCriterias as $projectCriteria)
        <div class="mt-4">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green" class="bi bi-check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <p class="fs-5 ms-2">{{ $projectCriteria->note->note }}</p>
            </div>
            <ul class="list-inf ms-5">
                @foreach ($projectCriteria->note->projectCriterias as $project_criteria)
                <li>
                    <p class="ms-3" style="font-size: 18px;">Desired Criteria: {{ $project_criteria->criteria->name }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>