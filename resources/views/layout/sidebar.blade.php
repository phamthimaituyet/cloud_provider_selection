<div class="search-index_content__filtersPanel" >
    <div class="mb-3 clear_all d-none">
        <a href="{{ route('home') }}">Clear all</a>
    </div>
    <div class="search-filters-filters_panel_component__filter">
        <div class="search-filters-filters_panel_component__filterHeader">
            <h3 class="search-filters-filters_panel_component__filterHeading">Category</h3>
            <span class="search-filters-filters_panel_component__chevron search-filters-filters_panel_component__expanded">
                <svg width="100%" height="100%">
                    <g xmlns="http://www.w3.org/2000/svg" fill="none" stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 4.000000)" stroke="currentColor" stroke-width="2">
                          <polyline transform="translate(5.500000, 2.500000) rotate(90.000000) translate(-5.500000, -2.500000)" points="10.5 5 5.5 6.66133815e-16 0.5 5"/>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
        <div class="search-filters-filters_panel_component__filterBody search-filters-filters_panel_component__expanded">
            <nav class="search-filters-category_filter_component__root" aria-label="categories filter">
                <ul>
                    <li class="search-filters-category_filter_component__category">
                        <p class="search-filters-category_filter_component__categoryLink search-filters-category_filter_component__current">All categories</p>
                        <span class="search-filters-category_filter_component__count">{{ count($categories) }}</span>
                    </li>
                    @foreach ($categories as $category)
                        <li class="search-filters-category_filter_component__category">
                            <a href="#" class="search-filters-category_filter_component__categoryLink search-filters-category_filter_component__child">{{ $category->name }}</a>
                            <span class="search-filters-category_filter_component__count">{{ count($category->products) }}</span>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <div class="search-filters-filters_panel_component__filter">
        <div class="search-filters-filters_panel_component__filterHeader">
            <h3 class="search-filters-filters_panel_component__filterHeading">Price</h3>
            <span
                class="search-filters-filters_panel_component__chevron search-filters-filters_panel_component__expanded">
                <svg width="100%" height="100%">
                    <g xmlns="http://www.w3.org/2000/svg" fill="none" stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 4.000000)" stroke="currentColor" stroke-width="2">
                          <polyline transform="translate(5.500000, 2.500000) rotate(90.000000) translate(-5.500000, -2.500000)" points="10.5 5 5.5 6.66133815e-16 0.5 5"/>
                        </g>
                    </g>
                </svg>

            </span>
        </div>
        <div class="search-filters-filters_panel_component__filterBody search-filters-filters_panel_component__expanded">
            <div>
                <form method="get" action="/search" data-analytics-form-id="Price">
                    <input type="hidden" name="term" value="cloud services">
                    <div class="search-filters-range_filter_component__inputsContainer">
                        <div class="search-filters-range_filter_component__inputWrapper">
                            <span class="search-filters-range_filter_component__prefix">
                                $
                            </span>
                            <input type="number" name="price_min"
                                class="search-filters-range_filter_component__input" placeholder="5"
                                title="Enter price as a whole number" pattern="^\d*$">
                        </div>
                        <span class="search-filters-range_filter_component__spacer">-</span>
                        <div class="search-filters-range_filter_component__inputWrapper">
                            <span class="search-filters-range_filter_component__prefix">
                                $
                            </span>
                            <input type="text" name="price_max"
                                class="search-filters-range_filter_component__input" placeholder="99"
                                title="Enter price as a whole number" pattern="^\d*$">
                        </div>
                        <button type="submit" aria-label="submit"
                            class="search-filters-range_filter_component__button">
                            <span class="search-filters-range_filter_component__chevron">
                                <svg width="100%" height="100%">
                                    <g xmlns="http://www.w3.org/2000/svg" fill="none" stroke="none" stroke-width="1" fill-rule="evenodd">
                                        <g transform="translate(-2.000000, 4.000000)" stroke="currentColor" stroke-width="2">
                                          <polyline transform="translate(5.500000, 2.500000) rotate(90.000000) translate(-5.500000, -2.500000)" points="10.5 5 5.5 6.66133815e-16 0.5 5"/>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="search-filters-filters_panel_component__filter">
        <div class="search-filters-filters_panel_component__filterHeader">
            <h3 class="search-filters-filters_panel_component__filterHeading">Prodivers</h3>
            <span
                class="search-filters-filters_panel_component__chevron search-filters-filters_panel_component__expanded">
                <svg width="100%" height="100%">
                    <g xmlns="http://www.w3.org/2000/svg" fill="none" stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 4.000000)" stroke="currentColor" stroke-width="2">
                          <polyline transform="translate(5.500000, 2.500000) rotate(90.000000) translate(-5.500000, -2.500000)" points="10.5 5 5.5 6.66133815e-16 0.5 5"/>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
        <div class="search-filters-filters_panel_component__filterBody search-filters-filters_panel_component__expanded">
            <div class="search-filters-checkbox_filter_component__root">
                @foreach ($providers as $provider)
                    <div class="search-filters-checkbox_filter_component__option text-start">
                        <input type="checkbox" class="form-check-input provider me-3" value={{ $provider->id }} name="provider[]">{{ $provider->name}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="search-filters-filters_panel_component__filter">
        <div class="search-filters-filters_panel_component__filterHeader">
            <h3 class="search-filters-filters_panel_component__filterHeading">Rating</h3>
            <span class="search-filters-filters_panel_component__chevron search-filters-filters_panel_component__expanded">
                <svg width="100%" height="100%">
                    <g xmlns="http://www.w3.org/2000/svg" fill="none" stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 4.000000)" stroke="currentColor" stroke-width="2">
                          <polyline transform="translate(5.500000, 2.500000) rotate(90.000000) translate(-5.500000, -2.500000)" points="10.5 5 5.5 6.66133815e-16 0.5 5"/>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
        <div class="search-filters-filters_panel_component__filterBody search-filters-filters_panel_component__expanded">
            <div class="search-filters-radio_filter_component__root">
                <div class="search-filters-radio_filter_component__option text-start">
                    <div class="form-check d-flex align-items-center" style="font-size: var(--font-size--body-s);">
                        <input class="form-check-input p-2 bd-highlight ratingRadio" type="radio" name="flexRadioDefault" value="0" id="flexRadioDefault0" checked>
                        <label class="form-check-label ms-1 p-2 bd-highlight" for="flexRadioDefault0" style="margin-right: 80px;"> Show all </label>
                        {{-- <p class="ms-auto p-2 bd-highlight">{{ $ratings->count() }}</p> --}}
                    </div>
                </div>
                @for ($i = 1; $i <= 5; $i++)
                    <div class="search-filters-radio_filter_component__option">
                        <div class="form-check d-flex align-items-center" style="font-size: var(--font-size--body-s);">
                            <input class="form-check-input me-2 ratingRadio" type="radio" name="flexRadioDefault" value={{ $i }} id="{{ 'flexRadioDefault' . $i }}">
                            <label class="form-check-label me-5" for="{{ 'flexRadioDefault' . $i }}">{{ $i }} star and higher </label>
                            {{-- <p>{{ $ratings->where($product->ratings_avg_number_star, $i)->count() }}</p> --}}
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('assets/js/search.js') }}"></script>
@endsection
