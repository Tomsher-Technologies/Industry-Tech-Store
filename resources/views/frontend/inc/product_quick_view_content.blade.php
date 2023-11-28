<div class="ps-product__header">
    <div class="ps-product__thumbnail" data-vertical="false">
        <div class="ps-product__images" data-arrow="true">
            <div class="item">
                <img src="{{ get_product_image($product->thumbnail_img, '300') }}" alt="{{ $product->name }}">
            </div>
        </div>
    </div>
    <div class="ps-product__info">
        <h1>
            <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}">
                {{ $product->name }}
            </a>
        </h1>
        <div class="ps-product__meta">

            @if ($product->brand)
                <p>Brand:
                    <a href="{{ route('products.brand', $product->brand->slug) }}"
                        title="{{ $product->brand->name }}">{{ $product->brand->name }}</a>
                </p>
            @endif

            {{ renderStarRating($product->rating) }}
        </div>

        @if (!$product->hide_price)
            <h4 class="ps-product__price">
                {{ home_discounted_base_price($product) }}
                @if (home_base_price($product) != home_discounted_base_price($product))
                    <del>{{ home_base_price($product) }}</del>
                @endif
            </h4>
        @endif
        <div class="ps-product__desc">
            {!! Str::limit(strip_tags($product->description), 250, $end = '...') !!}
        </div>
        <div class="ps-product__shopping">
            @if (!$product->hide_price)
                <a class="ps-btn" href="javascript:void(0)" onclick="addToCart('{{ $product->slug }}')">Add to
                    cart</a>
            @endif
            <a class="ps-btn ps-btn--orange" href="javascript:void(0)"
                onclick="addEnquiry('{{ $product->slug }}')">Enquire Now</a>
            <div class="ps-product__actions">
                <a class="{{ whishlistHasProduct($product->id) ? 'active' : '' }}" href="javascript:void(0)"
                    onclick="addToWishList('{{ $product->slug }}',this)" title="Add to wishlist">
                    <i class="icon-heart"></i></a>
            </div>
            
        </div>
    </div>
</div>
<script>
    $('.ps-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        emptyValue: '0',
    });
</script>
