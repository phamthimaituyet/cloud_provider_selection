<div class="search-index_content__searchResultsBody">
    <div class="search-index_content__searchResultsWrapper">
        <div class="search-item_cards_container_component__list">
            {{-- item --}}
            @foreach ($products as $product)
                <div class="shared-item_cards-card_component__root">
                    <div class="shared-item_cards-list-image_card_component__root">
                        <div class="shared-item_cards-list-image_card_component__contentWrapper shared-item_cards-list-image_card_component__landscapeImage">
                            <a href="#" class="shared-item_cards-list-image_card_component__itemLinkOverlay"></a>
                            <div class="shared-item_cards-list-image_card_component__imageWrapper">
                                <div class="shared-item_cards-preview_image_component__carousel shared-item_cards-preview_image_component__singleImage" style="padding-bottom: 50.847457627118644%">
                                    <a href="" class="shared-item_cards-preview_image_component__imageLink">
                                        <img class="shared-item_cards-preview_image_component__image" style="left: 0%" src="https://themeforest.img.customer.envatousercontent.com/files/218971784/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=300&s=78b21267fde81ed46009ccfb7243accc" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="shared-item_cards-list-image_card_component__detailsWrapper">
                                <h3 class="shared-item_cards-item_name_component__root">
                                    <a href="" class="shared-item_cards-item_name_component__itemNameLink">
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
                                <div class="shared-item_cards-list-image_card_component__attrsWrapper">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- end item --}}
        </div>
    </div>
</div>
