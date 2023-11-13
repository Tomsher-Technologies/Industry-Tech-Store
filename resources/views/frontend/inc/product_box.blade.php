<div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}">
            <img src="{{ get_product_image($product->thumbnail_img, '300') }}" alt="{{ $product->name }}"
                onerror="this.onerror=null;this.src='{{ frontendAsset('img/placeholder.webp') }}';" />
        </a>

        @if (discount_in_percentage($product) > 0)
            <div class="ps-product__badge">
                &nbsp;{{ discount_in_percentage($product) }}%
            </div>
        @endif

        <ul class="ps-product__actions">
            @if (!$product->hide_price)

                @if ($product->variant_product)
                    <li>
                        <a href="{{ route('product', $product->slug) }}" data-toggle="tooltip" data-placement="top"
                            title="Add To Cart">
                            <i class="icon-bag2"></i>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="javascript:void(0)" onclick="addToCart('{{ $product->slug }}')" data-toggle="tooltip"
                            data-placement="top" title="Add To Cart">
                            <i class="icon-bag2"></i>
                        </a>
                    </li>
                @endif
            @endif
            <li>
                <a href="javascript:void(0)" onclick="productQuickView({{ $product->id }})" data-toggle="tooltip"
                    data-placement="top" title="Quick View">
                    <i class="icon-eye"></i>
                </a>
            </li>
            <li>
                <a class="{{ whishlistHasProduct($product->id) ? 'active' : '' }}" href="javascript:void(0)" onclick="addToWishList('{{ $product->slug }}',this)" data-toggle="tooltip"
                    data-placement="top" title="Add to Whishlist">
                    <i class="icon-heart"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="ps-product__container">
        @if ($product->brand)
            <a class="ps-product__vendor" href="{{ route('products.brand', $product->brand->slug) }}"
                title="{{ $product->brand->name }}">
                {{ $product->brand->name }}
            </a>
        @endif
        <div class="ps-product__content">
            <a class="ps-product__title" title="{{ $product->name }}"
                href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>

            {{ renderStarRating($product->rating) }}
            @if (!$product->hide_price)
                <p class="ps-product__price sale">
                    @if ($product->variant_product)
                        {{ home_price($product) }}
                    @else
                        {{ home_discounted_base_price($product) }}
                        @if (home_base_price($product) != home_discounted_base_price($product))
                            <del>{{ home_base_price($product) }}</del>
                        @endif
                    @endif
                </p>
            @endif
        </div>
    </div>
</div>
