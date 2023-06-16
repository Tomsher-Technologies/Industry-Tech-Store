<div class="ps-product__header">
    <div class="ps-product__thumbnail" data-vertical="false">
        <div class="ps-product__images" data-arrow="true">
            <div class="item"><img src="img/products/shop/01.jpg" alt=""></div>
            <div class="item"><img src="img/products/shop/02.jpg" alt=""></div>
            <div class="item"><img src="img/products/shop/03.jpg" alt=""></div>
        </div>
    </div>
    <div class="ps-product__info">
        <h1>
            {{ $product->name }}
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

        <h4 class="ps-product__price">
            {{ home_discounted_base_price($product) }}
            @if (home_base_price($product) != home_discounted_base_price($product))
                <del>{{ home_base_price($product) }}</del>
            @endif
        </h4>
        <div class="ps-product__desc">
            {!! $product->description !!}
        </div>
        <div class="ps-product__shopping">
            <a class="ps-btn" href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">Add to
                cart</a>
            <a class="ps-btn ps-btn--orange" href="javascript:void(0)" onclick="buyNow({{ $product->id }})">Buy Now</a>
            <div class="ps-product__actions">
                <a href="javascript:void(0)" onclick="addToWishList('{{ $product->slug }}')" title="Add to wishlist"><i class="icon-heart"></i></a>
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
