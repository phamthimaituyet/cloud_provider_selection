<div class="containerInner detailHead">
    <div class="container detailTitle d-flex">
        <div class="inf-1">
            @if ($product->img_url)
                <img src="{{ url($product->img_url) }}" alt="">
            @else
                <img src="{{ asset('assets/images/default_image.png') }}" alt="">
            @endif
        </div>
        <div class="inf-2 flex-grow-1">
            <h1>{{ $product->name }}</h1>
            <span style="font-weight: 500; font-size: 17px;">
                <i style="color:#879596;">By:</i>
                <span style="color: blue;">
                    {{ $product->vendor->name }}
                </span>
            </span>
            <div class="inf-category">{{ $product->category->name }}</div>
            <div class="inf-review d-flex">
                <div>
                    @include('components.helper.star', ['count_star' => round($rating_avg), 'class_star' => ''])
                    @include('components.helper.star', ['count_star' => (5 - round($rating_avg)), 'class_star' => 'col-5 white'])
                </div>
                <span style="margin: 0px 1.5rem; padding: 2px; color: blue; font-weight: 600;">
                    {{ $review_stars->count() }} reviews
                </span>
            </div>
        </div>
        <div class="inf-3 d-flex" style="place-items: flex-end;">
        @if (Auth::check())
            @if (!isset($detail) || !$detail)
                <div class="px-4 mt-2 mb-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        <i class="bi bi-chat-left-text"></i> Write a review
                    </button>
                    <a href="{{ route('detailReview', ['id' => $product->id]) }}">
                        <button type="button" class="btn btn-outline-info">
                            <i class="bi bi-chevron-double-right"></i> Detailed review
                        </button>
                    </a>
                </div>
            @endif
        @else 
            <a href="{{ route('login.form') }}">
                <div class="px-4 mt-2 mb-2">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="bi bi-chat-left-text"></i> Write a review
                    </button>
                    <button type="button" class="btn btn-outline-info">
                        <i class="bi bi-chevron-double-right"></i> Detailed review
                    </button>
                </div>
            </a>
        @endif
        </div>
    </div>
</div>
