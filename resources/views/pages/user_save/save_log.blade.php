@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/project_criteria.css">

@section('content')
    <div class="container">
        <div class="mt-5 ms-3">
            <div class="row">
                <h3>{{ count($project_save) ? $project_save[0]->name : '' }}</h3>
                @foreach ($project_save as $project)
                    <?php
                    $product_ids = $project->body->product_id;
                    $notes = $project->body->notes;
                    ?>
                    {{-- Show information --}}
                    <div class="mt-4 parent-all-inf">
                        <span style="font-size: 18px;">
                            <i>Saved date: ({{ $project->created_at }})</i>
                        </span>
                        <div class="row mt-2">
                            <h3 class="view-title">Project information</h3>
                        </div>
                        <div class="all-inf mt-2">
                            @foreach ((array) $notes as $note)
                                <div class="d-flex align-items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green"
                                        class="bi bi-check2" viewBox="0 0 16 16">
                                        <path
                                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                    <p class="fs-5 ms-2">{{ $note->text }}</p>
                                </div>
                                {{-- Lay ra mang question voi array_values de set lai key --}}
                                <?php $questions = array_values((array) $note->questions); ?> 
                                @foreach ($questions as $key => $value_question)
                                    <ul class="list-unstyled faq-qa ms-5 mt-3">
                                        <li class="my-4">
                                            <h5 class="ms-3">{{ $key+1 }}. {{ $value_question->text }}</h5>
                                        </li>
                                        <span class="text-muted ms-5 fs-5">Desired Criteria: </span>
                                        @foreach ($value_question->criteria as $key => $criteria)
                                            <span class="text-muted fs-5">{{ $key ? '-' : '' }}
                                                {{ $criteria }}</span>
                                        @endforeach
                                    </ul>
                                @endforeach
                            @endforeach
                        </div>

                    </div>

                    {{-- Show product --}}
                    <div class="row mb-2 mt-4">
                        <div class="row mt-5 mb-3">
                            <h3 class="view-title col-10">Suggestion Service</h3>
                        </div>
                        @foreach ($product_ids as $product_id)
                            <?php $product = $project->getProductById($product_id); ?>
                            <div class="col-md-6">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-auto d-none d-lg-block">
                                        @if ($product->img_url)
                                            <img src={{ '/' . $product->img_url }} alt=""
                                                style="width: 200px; height: 209px;">
                                        @else
                                            <img src="/assets/images/default_image.png" alt=""
                                                style="width: 200px; height: 209px;">
                                        @endif
                                    </div>
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h4 class="name-product">
                                            {{ $product->name }}
                                        </h4>
                                        <strong class="d-inline-block mb-2 text-primary">By:
                                            {{ $product->vendor->name }}</strong>
                                        {{-- <div class="mb-1 text-muted">
                                            @include('components.helper.star', [
                                                'count_star' => round($product->ratings_avg_number_star),
                                                'class_star' => 'col-5',
                                            ])
                                            @include('components.helper.star', [
                                                'count_star' => 5 - round($product->ratings_avg_number_star),
                                                'class_star' => 'col-5 white',
                                            ])
                                            <a href="{{ route('show', ['id' => $product->id, 'type' => 'reviews']) }}"
                                                class="shared-item_cards-author_category_component__link">
                                                <span style="padding: 2px; color: blue; font-weight: 600;">
                                                    {{ $product->commnets->count() }} reviews
                                                </span>
                                            </a>
                                        </div> --}}
                                        <p class="card-text mb-auto">{{ $product->description }}</p>
                                        <a href="{{ route('show', ['id' => $product->id]) }}"
                                            class="stretched-link">Continue reading</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-top"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
