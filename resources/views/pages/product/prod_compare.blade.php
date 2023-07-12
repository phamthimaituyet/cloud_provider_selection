@extends('layout.master')

@section('title', 'Product Comparison')

@section('styles')
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/home_template.css">
    <link rel="stylesheet" href="/assets/css/detail.css">
    <link rel="stylesheet" href="/assets/css/compare_product.css">

@section('content')
    <header class="details">
        <div class="detailHead">
            <div class="container">
                <h1 class="mt-5 fs-1">Compare products</h1>
                <p class="mt-3" style="line-height: 1.5; font-size: large;">You are considering finding the right cloud
                    service for your project?
                    Trust Quality will help you choose the right service for your business. It's simple.
                    Just select 2 system services showing side-by-side feature comparison.
                    Furthermore, the comparison is based on real reviews from users.</p>
            </div>
        </div>
    </header>
    <div class="container mt-5">
        <div class="" style="min-height: 350px;">
            <h2 class="compare-form__title">Search Product Comparisons</h2>
            <form action="" method="get" class="mb-5" style="margin-top: 80px;">
                <div class="d-flex">
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect01" data-placeholder="Choose criteria" name="product_id">
                            <option selected value="0">Choose...</option>
                           @foreach ($providers as $provider)
                                <optgroup label={{ $provider->name }}>
                                    @foreach ($provider->product as $product)
                                        <option value={{ $product->id }}>{{ $product->name }}</option>
                                    @endforeach
                                </optgroup>
                           @endforeach
                        </select>
                    </div>
                    <div class="d-flex jc-c my-half">
                        <div class="compare-vs--purple-circle mx-4">VS</div>
                    </div>
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect02" data-placeholder="Choose criteria" name="product_id">
                            <option selected value="0">Choose...</option>
                           @foreach ($providers as $provider)
                                <optgroup label={{ $provider->name }}>
                                    @foreach ($provider->product as $product)
                                        <option value={{ $product->id }}>{{ $product->name }}</option>
                                    @endforeach
                                </optgroup>
                           @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex jc-c mt-2 mx-1 mt-5">
                    <button class="btn btn-primary" id="submit-compare" type="button" style="font-weight: 600; font-size: 18px;">Compare Now</button>
                </div>
            </form>
        </div>
        <div class="border-bottom"></div>
        <div class="mt-5" id="root-compare-component">
        </div>
        <div class="mt-5">
            <h2>Most Viewed Comparisons</h2>
            <div class="row my-5">
                @foreach ($providers_compare as $provider_compare)
                    <div class="col-3">
                        <div class="item">
                            <a href="" class="text-decoration-none submit-compare-vendor">
                                <div class="compare-list__imgs align-items-center">
                                    <div class="compare-list__img">
                                        <img alt="SOLIDWORKS" title="SOLIDWORKS"
                                            onerror="replaceWithDefaultDetail(this);"
                                            src="{{ "/" . $provider_compare[0]->img_url }}">
                                        <div class="compare-list__text px-half">{{ $provider_compare[0]->name }}</div>
                                        <input type="hidden" value={{ $provider_compare[0]->id }} class="provider_id1" />
                                    </div>
                                    <div class="d-flex jc-c my-half">
                                        <div class="compare-vs--purple-circle mx-4">VS</div>
                                    </div>
                                    <div class="compare-list__img">
                                        <img alt="SketchUp" title="SketchUp"
                                            onerror="replaceWithDefaultDetail(this);"
                                            src="{{ "/" . $provider_compare[1]->img_url }}">
                                        <div class="compare-list__text px-half">{{ $provider_compare[1]->name }}</div>
                                        <input type="hidden" value={{ $provider_compare[1]->id }} class="provider_id2" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!! $providers_compare->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/assets/js/compare.js"></script>
<script src="/assets/js/chart.min.js"></script>
@endsection
