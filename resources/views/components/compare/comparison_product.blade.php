@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

<h2 class="my-4">{{ $products[0]->name }} and {{ $products[1]->name }}</h2>
<div class="row">
    @foreach ($products as $key => $product) 
    <div class="col-6">
        <div class="compare-section-new ">
            <div class="sticky-header-container">
                <div class="header-section" style="height:123px">
                    <div>
                        <div class="logo-and-name">
                            <a href="{{ route('show', ['id' => $product->id]) }}" class="imageContainer" class="text-decoration-none">
                                <img class="" alt="Amazon Web Services" src={{ "/" . $product->vendor->img_url }}>
                            </a>
                            <div class="product-vendor-name">
                                <div class="shared-item_cards-list-image_card_component__detailsWrapper">
                                    <h2 class="shared-item_cards-item_name_component__root fs-4">
                                        <a class="text-decoration-none shared-item_cards-item_name_component__itemNameLink" href="{{ route('show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h2>
                                    <div class="" style="height: 2rem;">
                                        <i>by</i>
                                        <a href="{{ route('show', ['id' => $product->id]) }}" class="text-decoration-none shared-item_cards-author_category_component__link">
                                            {{ $product->vendor->name }}
                                        </a>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="close-icon"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rating-section">
                <div class="overall-score largest-rating reviews my-3">
                    <h4><strong>Overall Rating</strong></h4>
                    <div class="rating d-flex w-100 justify-content-center align-items-baseline mt-3">
                        <div class="c-1">{{ sprintf("%.1f", round($product->ratings_avg_number_star, 1)) }}</div>
                        <div class="me-3">
                            @include('components.helper.star', ['count_star' => round($product->ratings_avg_number_star), 'class_star' => 'col-5'])
                            @include('components.helper.star', ['count_star' => (5 - round($product->ratings_avg_number_star)), 'class_star' => 'col-5 white'])
                        </div>
                        <span>
                            <p>({{ $product->ratings_count }} Reviews)</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="review-section" style="height: 556px;">
                <h3 class="mt-5">Ratings</h3>
                <div>
                    @for($i = 0; $i < 5; $i++) 
                    <?php 
                        $count = $product->ratings->where('number_star', 5 - $i)->count();
                    ?>
                    <div class="d-flex align-items-center">
                        @include('components.helper.star', ['count_star' => 5 - $i, 'class_star' => 'star'])
                        <div class="progress me-2">
                            <div class="progress-bar" role="progressbar" 
                                style="background-color: #b7b6b6; width: <?= $product->ratings_count != 0 ? floor(($count / $product->ratings_count) * 100) : ''  ?>%" 
                                aria-valuenow="<?= $product->ratings_count != 0 ? floor(($count / $product->ratings_count) * 100) : '' ?>" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                        <div>
                            <p>{{ $count }}</p>
                        </div>
                    </div>
                    @endfor
                </div>
                <h3 class="mt-5 section-title">Highlighted reviews</h3>
                <?php $comments = $key ? $comment_product2 : $comment_product1 ?>
                <ul style="list-style: disc;">
                    @foreach ($comments as $comment)
                        <li class="mt-4 ms-3">{{ $comment->content }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="inf-section">
                <h3 class="mt-5 section-title">Certificate</h3>
                <div class="mt-4">
                    <p>{{ $product->certificate }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
