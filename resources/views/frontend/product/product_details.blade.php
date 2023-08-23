@extends('frontend.layouts.app')

@section('meta')
    {{-- <meta name="product-id" content="{{ $product->id }}"> --}}
@endsection

@section('content')
    <nav class="navigation--mobile-product">
        <a class="ps-btn ps-btn--black" href="javascript:void(0)" onclick="addCart('{{ $product->slug }}')">Add to cart</a>
        <a class="ps-btn" href="javascript:void(0)" onclick="addEnquiry('{{ $product->slug }}')">Enquire Now</a>
    </nav>

    <div class="ps-breadcrumb">
        <div class="ps-container">
            {{ Breadcrumbs::render('product', $product) }}
        </div>
    </div>
    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">

                                            @if ($product->thumbnail_img)
                                                <div class="item">
                                                    <a href="{{ get_product_image($product->thumbnail_img) }}">
                                                        <img src="{{ get_product_image($product->thumbnail_img, '500') }}"
                                                            alt="{{ $product->name }}" />
                                                    </a>
                                                </div>
                                            @endif

                                            @if ($product->photos)
                                                @foreach (explode(',', $product->photos) as $photo)
                                                    <div class="item">
                                                        <a href="{{ get_product_image($photo) }}">
                                                            <img src="{{ get_product_image($photo, '300') }}"
                                                                alt="{{ $product->name }}" />
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4"
                                    data-arrow="false">
                                    @if ($product->photos)
                                        @foreach (explode(',', $product->photos) as $photo)
                                            <div class="item">
                                                <a href="{{ get_product_image($photo) }}">
                                                    <img src="{{ get_product_image($photo, '300') }}"
                                                        alt="{{ $product->name }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1>
                                    {{ $product->name }}
                                </h1>
                                <div class="ps-product__meta">
                                    @if ($product->brand)
                                        <p>Brand:<a href="{{ route('products.brand', $product->brand->slug) }}"
                                                title="{{ $product->brand->name }}">{{ $product->brand->name }}</a></p>
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

                                @if ($product->short_description)
                                    <div class="ps-product__desc">
                                        {!! $product->short_description !!}
                                    </div>
                                @endif


                                <div class="ps-product__shopping">
                                    @if (!$product->hide_price)
                                        <figure>
                                            <figcaption>Quantity</figcaption>
                                            <div class="form-group--number">
                                                <button class="up quantity-plus"><i class="fa fa-plus"></i></button>
                                                <button class="down quantity-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control quantity-input"
                                                    data-min="{{ $product->min_qty ?? 1 }}"
                                                    data-max="{{ $product->stocks->first()->qty }}" type="number"
                                                    value="{{ $product->min_qty ?? 1 }}" />
                                            </div>
                                        </figure>

                                        <a class="ps-btn" href="javascript:void(0)"
                                            onclick="addCart('{{ $product->slug }}')">Add to cart</a>
                                    @endif


                                    <a class="ps-btn ps-btn--orange" href="javascript:void(0)"
                                        onclick="addEnquiry('{{ $product->slug }}')">Enquire Now</a>

                                    <div class="ps-product__actions">
                                        <a href="javascript:void(0)" onclick="addToWishList('{{ $product->slug }}')"
                                            title="Add to wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ps-product__specification">

                                    @if ($product->sku)
                                        <p><strong>SKU:</strong> {{ $product->sku }}</p>
                                    @endif

                                    @if ($product->category)
                                        <p class="categories">
                                            <strong> Category:</strong>
                                            <a
                                                href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                        </p>
                                    @endif

                                    @if ($product->tags)
                                        <p class="tags">
                                            <strong> Tags</strong>
                                            @foreach (explode(',', $product->tags) as $tag)
                                                <a href="{{ route('suggestion.search', $tag) }}">{{ $tag }} </a>
                                                @unless ($loop->last)
                                                    ,
                                                @endunless
                                            @endforeach
                                        </p>
                                    @endif

                                </div>
                                <div class="ps-product__sharing">

                                    @php
                                        $c_url = url()->current();
                                    @endphp

                                    <a class="facebook"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ $c_url }}"
                                        target="new">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a class="twitter"
                                        href="https://twitter.com/intent/tweet?text={{ rawurlencode($product->name) }}&url={{ $c_url }}"
                                        target="new">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="linkedin" href="https://wa.me?text={{ $c_url }}" target="new">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a class="instagram" href="mailto:?body={{ $c_url }}" target="new">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                @if ($product->tabs)
                                    @foreach ($product->tabs as $tab)
                                        <li><a href="#tabd-{{ $tab->id }}">{{ $tab->heading }}</a></li>
                                    @endforeach
                                @endif

                                @if ($product->video_link)
                                    <li><a href="#tab-video">Video</a></li>
                                @endif

                                @if ($product->pdf)
                                    <li><a href="#tab-datasheet">Datasheet</a></li>
                                @endif

                                @if ($product->reviews->count() > 0)
                                    <li>
                                        <a href="#tab-reviews">Reviews
                                            {{ $product->reviews->count() > 0 ? '(' . $product->reviews->count() . ')' : '' }}</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                        {!! $product->description !!}
                                    </div>
                                </div>

                                @if ($product->tabs)
                                    @foreach ($product->tabs as $tab)
                                        <div class="ps-tab" id="tabd-{{ $tab->id }}">
                                            <div class="ps-document">
                                                {!! $tab->content !!}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if ($product->video_link)
                                    <div class="ps-tab" id="tab-video">
                                        <div class="ps-document">
                                            @if ($product->video_provider == 'youtube' && isset(explode('=', $product->video_link)[1]))
                                                <iframe title="Product Video" height="450"
                                                    class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/{{ explode('=', $product->video_link)[1] }}"></iframe>
                                            @elseif ($product->video_provider == 'dailymotion' && isset(explode('video/', $product->video_link)[1]))
                                                <iframe title="Product Video" class="embed-responsive-item"
                                                    src="https://www.dailymotion.com/embed/video/{{ explode('video/', $product->video_link)[1] }}"></iframe>
                                            @elseif ($product->video_provider == 'vimeo' && isset(explode('vimeo.com/', $product->video_link)[1]))
                                                <iframe title="Product Video"
                                                    src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $product->video_link)[1] }}"
                                                    width="500" height="281" webkitallowfullscreen mozallowfullscreen
                                                    allowfullscreen></iframe>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($product->pdf)
                                    <div class="ps-tab" id="tab-datasheet">
                                        <div class="ps-document text-center">
                                            <a class="ps-btn" href="{{ uploaded_asset($product->pdf) }}">Download
                                                Datasheet</a>
                                        </div>
                                    </div>
                                @endif

                                @if ($product->reviews->count())
                                    <div class="ps-tab" id="tab-reviews">
                                        <div class="row">
                                            @php
                                                $total_rating = $product->reviews->sum('rating') / $product->reviews->count();
                                            @endphp
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                                <div class="ps-block--average-rating">
                                                    <div class="ps-block__header">
                                                        <h3>{{ number_format((float) $total_rating, 2, '.', '') }}</h3>
                                                        <select class="ps-rating" data-read-only="true">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i <= $total_rating ? 1 : 2 }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <span>{{ $product->reviews->count() }}
                                                            {{ Str::plural('Review', $product->reviews->count()) }}</span>
                                                    </div>

                                                    @for ($i = 5; $i > 0; $i--)
                                                        @php
                                                            $rateTot = $product->reviews->where('rating', $i)->count();
                                                            $perc = ($rateTot / $product->reviews->count()) * 100;
                                                            $perc = floor($perc);
                                                        @endphp

                                                        <div class="ps-block__star">
                                                            <span>{{ $i }} Star</span>
                                                            <div class="ps-progress" data-value="{{ $perc }}">
                                                                <span></span>
                                                            </div>
                                                            <span>{{ $perc }}%</span>
                                                        </div>
                                                    @endfor

                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                                @include('frontend.product.product_review_listing')
                                                @livewire('frontend.review-form', ['product' => $product->id])
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_same-brand">
                        <h3>Same Brand</h3>
                        <div class="widget__content">
                            <div id="brand_section">
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="ps-section--default ps-customer-bought">
                <div class="ps-section__header">
                    <h3>Customers who bought this item also bought</h3>
                </div>
                <div class="ps-section__content">
                    <div id="also_bought_section">

                    </div>
                </div>
            </div>
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div id="related_section">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('header')
@endsection
@push('scripts')
    <script>
        function addCart(slug) {
            count = parseInt($('.quantity-input').val());
            addToCart(slug, count);
        }

        function getParts() {
            // Same brand
            $.post('{{ route('product.details.same_brand') }}', {
                _token: '{{ csrf_token() }}',
                'brand_id': {{ $product->brand_id }},
                'product_id': {{ $product->id }}
            }, function(data) {
                $('#brand_section').html(data);
            });

            // Related products
            $.post('{{ route('product.details.related_products') }}', {
                _token: '{{ csrf_token() }}',
                'product_id': {{ $product->id }}
            }, function(data) {
                $('#related_section').html(data);
                owlCarouselConfig2()
            });

            // Also bought
            $.post('{{ route('product.details.also_bought') }}', {
                _token: '{{ csrf_token() }}',
                'product_id': {{ $product->id }}
            }, function(data) {
                $('#also_bought_section').html(data);
                // owlCarouselConfig2()
            });
        }

        $(document).ready(function() {
            setTimeout(function() {
                getParts()
            }, 3000);
        });
    </script>
@endpush
