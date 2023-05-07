<div class="containerInner detailHead">
    <div class="container detailTitle d-flex">
        <div class="inf-1">
            @if ($product->img_url)
                <img src="{{ url($product->img_url) }}" alt="">
            @else
                <img src="{{ asset('assets/images/default_image.png') }}" alt="">
            @endif
        </div>
        <div class="inf-2">
            <h1>{{ $product->name }}</h1>
            <span style="font-weight: 500;">
                <i style="color:#879596;">By:</i>
                <span style="color: blue;">
                    {{ $product->vendor->name }}
                </span>
            </span>
            <div class="inf-category">{{ $product->category->name }}</div>
            <div class="inf-review d-flex">
                @include('components.helper.star', ['count_star' => 5, 'class_star' => ''])
                <span style="margin: 0px 1.5rem; padding: 2px; color: blue; font-weight: 600;">
                    {{ $reviews->count() }} reviews
                </span>
            </div>
        </div>
    </div>
</div>
