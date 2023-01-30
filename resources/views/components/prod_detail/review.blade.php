<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <h1 style="font-weight: 100;">Review Highlights</h1>
    <div class="d-flex reviews">
        <div class="rating">
            <div class="c-1">5.0</div>
            <div class="c-2 d-flex mx-5">
                @include('components.helper.star', ['count_star' => 5, 'class_star' => 'col-5'])
                <span>
                    <p>Out of 5 (10 Reviews)</p>
                </span>
            </div>
        </div>
        <div class="avg-rating">
            <div>
                <span>Average Rating</span>
            </div>
            <div>
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 5, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>10</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 4, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>0</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 3, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>0</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 2, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>0</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    @include('components.helper.star', ['count_star' => 1, 'class_star' => 'star'])
                    <div class="progress me-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div>
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments px-4 mt-2 mb-2">
            <button type="button" class="btn btn-outline-secondary">Write a review</button>
        </div>
    </div>
    <h1 style="font-weight: 100;">Reviews</h1>
    <div>
        <p style="margin-top: 30px;"><b>Username Review</b></p>
        @include('components.helper.star', ['count_star' => 5, 'class_star' => ''])
        <div style="margin-top: 10px;">Content</div>
        <div>Date</div>
        <div>
            <div id="pt1:r1:1:i1:0:rd1:dc_pgls4" class="x1a mt-3 mb-5" style="border-top:1px solid #D6DFE6;"></div>
        </div>
    </div>
    <div>
        <p style="margin-top: 30px;"><b>Username Review</b></p>
        @include('components.helper.star', ['count_star' => 5, 'class_star' => ''])
        <div style="margin-top: 10px;">Content</div>
        <div>Date</div>
        <div>
            <div id="pt1:r1:1:i1:0:rd1:dc_pgls4" class="x1a mt-3 mb-5" style="border-top:1px solid #D6DFE6;"></div>
        </div>
    </div>
</div>
