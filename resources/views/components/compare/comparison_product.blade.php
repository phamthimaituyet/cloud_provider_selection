@section('styles')
    <link rel="stylesheet" href="/assets/css/detail.css">
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
                        @if(isset($comment->content))
                            <li class="mt-4 ms-3">{{ $comment->content }}</li>
                        @else
                            <p style="text-align: center; font-size: xx-large; margin-top: 100px;">No information</p>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="inf-section" style="height: 100px;">
                <h3 class="mt-5 section-title">Certificate</h3>
                <div class="mt-4">
                    @if (is_array($product->certificate))
                        @foreach ($product->certificate as $value)
                            <p>{{ $value }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-5" style="height: 600px;">
            <h3>Rating score</h3>
            <?php $product_criterias = $key ? $product_criterias2 : $product_criterias1 ?>
            {{-- <i>Rating score by: {{ $product_criterias[0]->user_id }}</i> --}}
            @if (!empty($product_criterias))
                <canvas id={{ "myChart" . $key }} width="600" height="500"></canvas>
            @else
                <p style="text-align: center; font-size: xx-large; margin-top: 100px;">No information</p>
            @endif
        </div>
    </div>
    <script type="module">
        const id = "myChart" + {{ $key }} 
        const array = {!! json_encode($product_criterias); !!}
        const arrayLabel = array.map(value => value.name);
        const arrayData = array.map(value => value.sum);
        const ctx = document.getElementById(id);
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: arrayLabel,
            datasets: [{
                label: '# of Score',
                data: arrayData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 192, 203, 0.2)',
                    'rgba(230, 230, 250, 0.2)',
                    'rgba(173, 255, 47, 0.2)',
                    'rgba(0, 255, 255, 0.2)',
                    'rgba(25, 25, 112, 0.2)',
                    'rgba(95, 158, 160, 0.2)',
                    'rgba(255, 215, 0, 0.2)',
                    'rgba(128, 0, 128, 0.2)',
                    'rgba(255, 69, 0, 0.2)',
                    'rgba(107, 142, 35, 0.2)',
                    'rgba(0, 191, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 192, 203, 1)',
                    'rgba(230, 230, 250, 1)',
                    'rgba(173, 255, 47, 1)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(25, 25, 112, 1)',
                    'rgba(95, 158, 160, 1)',
                    'rgba(255, 215, 0, 1)',
                    'rgba(128, 0, 128, 1)',
                    'rgba(255, 69, 0, 1)',
                    'rgba(107, 142, 35, 1)',
                    'rgba(0, 191, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });
    </script>
    @endforeach
</div>
