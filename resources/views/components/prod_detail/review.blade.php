<div class="tab-pane fade {{ app('request')->input('page') || app('request')->input('type') === 'reviews' ? 'show active' : ''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <h1 style="font-weight: 100; color: #0e7f74;">Review Highlights</h1>
    <div class="d-flex reviews">
        <div class="rating">
            <div class="c-1">5.0</div>
            <div class="c-2 d-flex mx-5">
                @include('components.helper.star', ['count_star' => 5, 'class_star' => 'col-5'])
                <span>
                    <p>Out of 5 ({{ $reviews->count() }} Reviews)</p>
                </span>
            </div>
        </div>
        <div class="avg-rating">
            <div>
                <span>Average Rating</span>
            </div>
            <div>
                @for($i = 0; $i < 5; $i++) 
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 5 - $i, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" style="background-color: #b7b6b6; width: <?= $reviews->count() != 0 ? floor(($review_stars[$i] / $reviews->count()) * 100) : ''  ?>%" aria-valuenow="<?= $reviews->count() != 0 ? floor(($review_stars[$i] / $reviews->count()) * 100) : '' ?>" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>{{ $review_stars[$i] }}</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <div class="comments px-4 mt-2 mb-2">
            <!-- Button trigger modal -->
            @if (Auth::check())
                <div class="px-4 mt-2 mb-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        <i class="bi bi-chat-left-text"></i> Write a review
                    </button>
                </div>
                <div class="px-4 mt-2 mb-2">
                    <a href="{{ route('detailReview', ['id' => $product->id]) }}">
                        <button type="button" class="btn btn-outline-info">
                            <i class="bi bi-chevron-double-right"></i> Detailed review
                        </button>
                    </a>
                </div>
            @else 
                <a href="{{ route('login.form') }}">
                    <div class="px-4 mt-2 mb-2">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-chat-left-text"></i> Write a review
                        </button>
                    </div>
                    <div class="px-4 mt-2 mb-2">
                        <button type="button" class="btn btn-outline-info">
                            <i class="bi bi-chevron-double-right"></i> Detailed review
                        </button>
                    </div>
                </a>
            @endif
        </div>
    </div>
    <h1 style="font-weight: 100;">Reviews</h1>
    @if(count($reviews))
        @foreach ($reviews as $review )
            <div>
                <p style="margin-top: 30px;"><b>{{ $review->user->name }}</b></p>
                @include('components.helper.star', ['count_star' => $review->number_star, 'class_star' => ''])
                @include('components.helper.star', ['count_star' => (5 - $review->number_star), 'class_star' => 'white'])
                <div style="margin-top: 10px;">{{ $review->content }}</div>
                <div>{{ $review->created_at->format('d-m-Y') }}</div>
                <div>
                    <div id="pt1:r1:1:i1:0:rd1:dc_pgls4" class="x1a mt-3 mb-5" style="border-top:1px solid #D6DFE6;"></div>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {!! $reviews->links() !!}
        </div>
    @else
        <div class="mt-5 py-5 text-center" style="margin-bottom: 100px;">
            <span class="no-inf">This app or service has not been reviewed.</span>
        </div>
    @endif
</div>
