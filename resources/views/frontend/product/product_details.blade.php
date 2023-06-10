@extends('frontend.layouts.app')

@section('meta')
    <meta name="product-id" content="{{ $product->id }}">

    <!-- Schema.org markup for Google+ -->
    {{-- <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:price:currency" content="{{ \App\Models\Currency::findOrFail(get_setting('system_default_currency'))->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}"> --}}
@endsection

@section('content')
    <nav class="navigation--mobile-product">
        <a class="ps-btn ps-btn--black" href="shopping-cart.html">Add to cart</a>
        <a class="ps-btn" href="checkout.html">Buy Now</a>
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
                            {{-- <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            <div class="item">
                                                <a href="img/products/detail/fullwidth/01.jpg"><img
                                                        src="img/products/detail/fullwidth/01.jpg" alt="" /></a>
                                            </div>
                                            <div class="item">
                                                <a href="img/products/detail/fullwidth/02.jpg"><img
                                                        src="img/products/detail/fullwidth/02.jpg" alt="" /></a>
                                            </div>
                                            <div class="item">
                                                <a href="img/products/detail/fullwidth/03.jpg"><img
                                                        src="img/products/detail/fullwidth/03.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4"
                                    data-arrow="false">
                                    <div class="item">
                                        <img src="img/products/detail/fullwidth/01.jpg" alt="" />
                                    </div>
                                    <div class="item">
                                        <img src="img/products/detail/fullwidth/02.jpg" alt="" />
                                    </div>
                                    <div class="item">
                                        <img src="img/products/detail/fullwidth/03.jpg" alt="" />
                                    </div>
                                </div>
                            </div> --}}
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
                                <h4 class="ps-product__price">
                                    {{ home_discounted_base_price($product) }}
                                    @if (home_base_price($product) != home_discounted_base_price($product))
                                        <del>{{ home_base_price($product) }}</del>
                                    @endif
                                </h4>

                                @if ($product->short_description)
                                    <div class="ps-product__desc">
                                        {{ $product->short_description }}
                                    </div>
                                @endif

                                <div class="ps-product__shopping">
                                    <figure>
                                        <figcaption>Quantity</figcaption>
                                        <div class="form-group--number">
                                            <button class="up"><i class="fa fa-plus"></i></button>
                                            <button class="down">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control" type="text" placeholder="1" />
                                        </div>
                                    </figure>
                                    <a class="ps-btn" href="#">Add to cart</a>
                                    <a class="ps-btn ps-btn--orange" href="#">Buy Now</a>

                                    <div class="ps-product__actions">
                                        <a href="#">
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

                                <li><a href="#tab-4">Reviews
                                        {{ $product->reviews->count() > 0 ? '(' . $product->reviews->count() . ')' : '' }}</a>
                                </li>
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
                                                <iframe title="Product Video" height="450" class="embed-responsive-item"
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

                                <div class="ps-tab" id="tab-4">
                                    <div class="row">

                                        @if ($product->reviews->count())
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
                                        @endif
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                            @livewire('frontend.review-form', ['product' => $product->id])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="ps-page__right">
                    <aside class="widget widget_same-brand">
                        <h3>Same Brand</h3>
                        <div class="widget__content">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/5.jpg"
                                            alt="" /></a>
                                    <div class="ps-product__badge">-37%</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Robert's Store</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show
                                            Jumping Novel</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">
                                            AED32.99 <del>AED41.00 </del>
                                        </p>
                                    </div>
                                    <div class="ps-product__content hover">
                                        <a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show
                                            Jumping Novel</a>
                                        <p class="ps-product__price sale">
                                            AED32.99 <del>AED41.00 </del>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/6.jpg"
                                            alt="" /></a>
                                    <div class="ps-product__badge">-5%</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Danfoss</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Motometer Temperature
                                            Gauge - 641 011 7019</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">
                                            AED100.99 <del>AED106.00 </del>
                                        </p>
                                    </div>
                                    <div class="ps-product__content hover">
                                        <a class="ps-product__title" href="product-default.html">Motometer Temperature
                                            Gauge - 641 011 7019</a>
                                        <p class="ps-product__price sale">
                                            AED100.99 <del>AED106.00 </del>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div> --}}
            </div>
            {{-- <div class="ps-section--default ps-customer-bought">
                <div class="ps-section__header">
                    <h3>Customers who bought this item also bought</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/4.jpg"
                                            alt="" /></a>
                                    <div class="ps-product__badge hot">hot</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Global Office</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Xbox One Wireless
                                            Controller Black Color</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price">AED55.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/5.jpg"
                                            alt="" /></a>
                                    <div class="ps-product__badge">-37%</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Robert's Store</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show
                                            Jumping Novel</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">
                                            AED32.99 <del>AED41.00 </del>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/6.jpg"
                                            alt="" /></a>
                                    <div class="ps-product__badge">-5%</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Danfoss</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Motometer Temperature
                                            Gauge - 641 011 7019</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">
                                            AED100.99 <del>AED106.00 </del>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="product-default.html"><img src="img/products/shop/9.jpg"
                                            alt="" /></a>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#product-quickview"><i
                                                    class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">Tyco</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="product-default.html">Deckma OMD-24 Bilge Alarm
                                            Unit - 79550</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>02</span>
                                        </div>
                                        <p class="ps-product__price">AED35.89</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
                        data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                        data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/11.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">BW Technologies</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">Deckma OMD-24 Bilge Alarm
                                        Unit - 79550</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">AED13.43</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/12.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">Apollo</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">SELCO Engine Controller. 24V
                                        DC - H2000.0020</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">AED75.44</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/13.jpg" alt="" /></a>
                                <div class="ps-product__badge">-7%</div>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">Tyco</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">SELCO Engine Controller. 24V
                                        DC - H2000.0020</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">
                                        AED57.99 <del>AED62.99 </del>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/14.jpg" alt="" /></a>
                                <div class="ps-product__badge">-7%</div>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">Apollo</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">Beat Spill 2.0 Wireless
                                        Speaker – White</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">
                                        AED57.99 <del>AED62.99 </del>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/15.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">Tyco</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">ASUS Chromebook Flip – 10.2
                                        Inch</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">AED332.38</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/16.jpg" alt="" /></a>
                                <div class="ps-product__badge">-7%</div>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">Tyco</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">Apple Macbook Retina Display
                                        12&quot;</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">
                                        AED1200.00 <del>AED1362.99 </del>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/10.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">BW Technologies</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">AED599.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/11.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">BW Technologies</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">AED233.28</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-default.html"><img src="img/products/shop/12.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#product-quickview">
                                            <i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="#">BW Technologies</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">AED233.28</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@section('header')
    @livewireScripts
    @livewireStyles
@endsection
