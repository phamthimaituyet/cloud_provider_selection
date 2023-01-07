<div class="search-index_content__filtersPanel" >
    <div class="search-index_content__mobileFiltersHeader">
        <div class="search-index_content__mobileFiltersHeadings">
            <h3>Filter &amp; Refine</h3>
            <span>179 results</span>
        </div>
        <a href="/search/cloud%20services">Clear all</a>
        <button>
            Done
        </button>
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
                        <a class="search-filters-category_filter_component__categoryLink search-filters-category_filter_component__current"
                            href="/search/cloud%20services#content">All categories</a>
                        <span class="search-filters-category_filter_component__count">{{ count($products) }}</span>
                    </li>
                    @foreach ($categories as $category)
                        <li class="search-filters-category_filter_component__category">
                            <a class="search-filters-category_filter_component__categoryLink search-filters-category_filter_component__child"
                                href="/category/site-templates?term=cloud%20services#content">{{ $category->name }}</a>
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
                    <div class="search-filters-checkbox_filter_component__option">
                        <a class="search-filters-checkbox_filter_component__link"
                            href="/search/cloud%20services?sales=rank-0#content">
                            <span class="search-filters-checkbox_filter_component__checkbox"></span>
                            {{ $provider->name}}
                        </a> 
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
                <div class="search-filters-radio_filter_component__option">
                    <a class="search-filters-radio_filter_component__link"
                        href="/search/cloud%20services#content">
                        <input type="radio" class="search-filters-radio_filter_component__radioInput"
                            checked="" name="rating_min" value="">
                        <span>Show all</span>
                    </a> <span class="search-filters-radio_filter_component__count">179</span>
                </div>
                <div class="search-filters-radio_filter_component__option">
                    <a class="search-filters-radio_filter_component__link"
                        href="/search/cloud%20services?rating_min=1#content">
                        <input type="radio" class="search-filters-radio_filter_component__radioInput"
                            name="rating_min" value="1">
                        <span>1 star and higher</span>
                    </a> <span class="search-filters-radio_filter_component__count">59</span>
                </div>
                <div class="search-filters-radio_filter_component__option">
                    <a class="search-filters-radio_filter_component__link"
                        href="/search/cloud%20services?rating_min=2#content">
                        <input type="radio" class="search-filters-radio_filter_component__radioInput"
                            name="rating_min" value="2">
                        <span>2 stars and higher</span>
                    </a> <span class="search-filters-radio_filter_component__count">59</span>
                </div>
                <div class="search-filters-radio_filter_component__option">
                    <a class="search-filters-radio_filter_component__link"
                        href="/search/cloud%20services?rating_min=3#content">
                        <input type="radio" class="search-filters-radio_filter_component__radioInput"
                            name="rating_min" value="3">
                        <span>3 stars and higher</span>
                    </a> <span class="search-filters-radio_filter_component__count">59</span>
                </div>
                <div class="search-filters-radio_filter_component__option">
                    <a class="search-filters-radio_filter_component__link"
                        href="/search/cloud%20services?rating_min=4#content">
                        <input type="radio" class="search-filters-radio_filter_component__radioInput"
                            name="rating_min" value="4">
                        <span>4 stars and higher</span>
                    </a> <span class="search-filters-radio_filter_component__count">55</span>
                </div>
            </div>

        </div>
    </div>
</div>
