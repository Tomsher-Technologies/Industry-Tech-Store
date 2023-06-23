<div class="ps-cart__content">

    @php
        $price = 0;
    @endphp

    @if ($carts->count())
        <div class="ps-cart__items">
            @foreach ($carts as $cart)
                <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail">
                        <a href="{{ route('product', $cart->product->slug) }}" title="{{ $cart->product->name }}">
                            <img src="{{ uploaded_asset($cart->product->thumbnail_img) ?? frontendAsset('img/placeholder.webp') }}"
                                alt="{{ $cart->product->name }}" />
                        </a>
                    </div>
                    <div class="ps-product__content">
                        <a class="ps-product__remove" href="#" wire:click.prevent="remove({{ $cart->id }})">
                            <i class="icon-cross"></i>
                        </a>
                        <a href="{{ route('product', $cart->product->slug) }}" title="{{ $cart->product->name }}">
                            {{ $cart->product->name }}
                        </a>
                        <div>
                            <figure>
                                <figcaption>Quantity</figcaption>
                                {{-- <div class="form-group--number">
                                    <button wire:click.prevent="increment({{ $loop->index }})" class="up">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button wire:click.prevent="decrement({{ $loop->index }})" class="down">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <form action="">
                                        <input wire:model='cart_quality.{{ $loop->index }}.qty'
                                            class="form-control quantity-input"
                                            data-min="{{ $cart->product->min_qty ?? 1 }}"
                                            data-max="{{ $cart->product->stocks->first()->qty }}" type="number" />
                                    </form>
                                </div> --}}

                            </figure>
                        </div>
                        <p>
                            <small>{{ $cart->quantity }} x {{ single_price($cart->price) }}</small>
                        </p>
                    </div>
                </div>

                @php
                    $price += $cart->quantity * $cart->price;
                @endphp
            @endforeach
        </div>

        <div class="ps-cart__footer">
            <h3>Sub Total:<strong>{{ single_price($price) }}</strong></h3>
            <figure>
                <a class="ps-btn" href="{{ route('cart') }}">View Cart</a>
                <a class="ps-btn" href="{{ route('checkout.shipping_info') }}">Checkout</a>
            </figure>
        </div>
    @else
        <p>No Items in cart</p>
    @endif


</div>
