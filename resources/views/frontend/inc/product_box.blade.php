<div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}">
            <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{ $product->name }}"
                onerror="this.onerror=null;this.src='{{ frontendAsset('img/placeholder.webp') }}';" />
        </a>

        @if (discount_in_percentage($product) > 0)
            <div class="ps-product__badge">
                &nbsp;{{ discount_in_percentage($product) }}%
            </div>
        @endif

        <ul class="ps-product__actions">
            <li>
                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip"
                    data-placement="top" title="Add To Cart">
                    <i class="icon-bag2"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" onclick="productQuickView({{ $product->id }})" data-toggle="tooltip"
                    data-placement="top" title="Quick View">
                    <i class="icon-eye"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip"
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

            <p class="ps-product__price sale">
                {{ home_discounted_base_price($product) }}
                @if (home_base_price($product) != home_discounted_base_price($product))
                    <del>{{ home_base_price($product) }}</del>
                @endif
            </p>
        </div>
    </div>
</div>
