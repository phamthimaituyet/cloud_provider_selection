<div class="search-index_content__searchResultsBody">
    <div class="search-index_content__searchResultsWrapper">
        <div class="search-item_cards_container_component__list">
            {{-- item --}}
            @foreach ($products as $product)
                <div class="shared-item_cards-card_component__root">
                    <div class="shared-item_cards-list-image_card_component__root">
                        <div class="shared-item_cards-list-image_card_component__contentWrapper shared-item_cards-list-image_card_component__landscapeImage">
                            <a href="{{ route('show', ['id' => $product->id]) }}" class="shared-item_cards-list-image_card_component__itemLinkOverlay"></a>
                            <div class="shared-item_cards-list-image_card_component__imageWrapper">
                                <div class="shared-item_cards-preview_image_component__carousel shared-item_cards-preview_image_component__singleImage" style="padding-bottom: 50.847457627118644%">
                                    <a href="{{ route('show', ['id' => $product->id]) }}" class="shared-item_cards-preview_image_component__imageLink">
                                        @if ($product->img_url)
                                            <img class="shared-item_cards-preview_image_component__image" style="display: block; margin-left: auto; margin-right: auto; max-width: 170px;" src={{ $product->img_url }} alt="">
                                        @else
                                            <img class="shared-item_cards-preview_image_component__image" style="left: 0%" src={{ asset('assets/images/default_image.png') }} alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="shared-item_cards-list-image_card_component__detailsWrapper">
                                <h3 class="shared-item_cards-item_name_component__root">
                                    <a href="{{ route('show', ['id' => $product->id]) }}" class="shared-item_cards-item_name_component__itemNameLink">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <div>
                                    <div class="shared-item_cards-author_category_component__root">
                                        <i>by</i>
                                        <a href="" class="shared-item_cards-author_category_component__link">
                                            {{ $product->vendor->name }}
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    @include('components.helper.star', ['count_star' => round($product->ratings_avg_number_star), 'class_star' => 'col-5'])
                                    @include('components.helper.star', ['count_star' => (5 - round($product->ratings_avg_number_star)), 'class_star' => 'col-5 white'])
                                    <a href="{{ route('show', ['id' => $product->id, 'type' => 'reviews']) }}" class="shared-item_cards-author_category_component__link">
                                        <span style="padding: 2px; color: blue; font-weight: 600;">
                                            {{ $product->commnets->count() }} reviews
                                        </span>
                                    </a>
                                </div>
                                <div class="shared-item_cards-list-image_card_component__attrsWrapper">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- end item --}}
            <div class="mt-4">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</div>
