@extends('frontend.layouts.app')

@section('meta')
    <meta name="twitter:data1" content="{{ convert_price($product->unit_price) }}">
    <meta name="twitter:label1" content="Price">
    <meta property="og:price:amount" content="{{ convert_price($product->unit_price) }}" />
    <meta property="product:price:currency" content="{{ getCurrentCurrency()->code }}" />

    @if (env('FACEBOOK_PIXEL_ID'))
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif
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
                                        <div class="gallery-image">
                                            <div class="galleries">
                                                <div class="detail-gallery">
                                                    <div class="product-image-slider">
                                                        @if ($product->thumbnail_img)
                                                            <figure class="border-radius-10"><img
                                                                    src="{{ get_product_image($product->thumbnail_img) }}"
                                                                    alt="{{ $product->name }}"></figure>
                                                        @endif
                                                        @if ($product->photos)
                                                            @foreach (explode(',', $product->photos) as $photo)
                                                                <figure class="border-radius-10"><img
                                                                        src="{{ get_product_image($photo) }}"
                                                                        alt="{{ $product->name }}"></figure>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="slider-nav-thumbnails">
                                                    @if ($product->thumbnail_img)
                                                        <div>
                                                            <div class="item-thumb">
                                                                <img src="{{ get_product_image($product->thumbnail_img, 300) }}"
                                                                    alt="{{ $product->name }}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($product->photos)
                                                        @foreach (explode(',', $product->photos) as $photo)
                                                            <div>
                                                                <div class="item-thumb">
                                                                    <img src="{{ get_product_image($photo, 300) }}"
                                                                        alt="{{ $product->name }}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
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
                                    <h4 id="product_price" class="ps-product__price">
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

                                @if (!$product->hide_price)
                                    <div class="ps-product__variations" id="option-choice-form">
                                        @if ($product->choice_options != null)
                                            @foreach (json_decode($product->choice_options) as $key => $choice)
                                                <figure>
                                                    <figcaption>
                                                        {{ \App\Models\Attribute::find($choice->attribute_id)->name }}:
                                                    </figcaption>
                                                    <div class="grid flex-varients-pro">
                                                        @foreach ($choice->values as $key => $value)
                                                            <label for="{{ $choice->attribute_id }}_{{ $key }}"
                                                                class="card">
                                                                <input
                                                                    id="{{ $choice->attribute_id }}_{{ $key }}"
                                                                    value="{{ $value }}"
                                                                    name="attribute_id_{{ $choice->attribute_id }}"
                                                                    class="radio" type="radio"
                                                                    {{ $key == 0 ? 'checked' : '' }}>
                                                                <span class="plan-details">
                                                                    <span class="plan-type">{{ $value }}</span>
                                                                </span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </figure>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif

                                <div class="ps-product__shopping">
                                    @if (!$product->hide_price && hasStock($product))
                                        <figure>
                                            <figcaption>Quantity</figcaption>
                                            <div class="form-group--number">
                                                <button class="up quantity-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button class="down quantity-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control quantity-input"
                                                    data-min="{{ $product->min_qty ?? 1 }}"
                                                    data-max="{{ $product->stocks->first()->qty }}" type="number"
                                                    value="{{ $product->min_qty ?? 1 }}" />
                                            </div>
                                        </figure>
                                        <a id="add-to-cart" class="ps-btn" href="javascript:void(0)"
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

                                @if ($product->hide_price || !hasStock($product))
                                    <p class="enquiry-notification">
                                        <b>
                                            For pricing and availability, please send an email to <a
                                                href="mailto:sales@industrytechstore.com">sales@industrytechstore.com</a>
                                        </b>
                                    </p>
                                @endif

                                <div class="ps-product__specification">

                                    @if ($product->sku)
                                        <p><strong>SKU:</strong> <span id="sku">{{ $product->sku }}</span></p>
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

    <div class="modal" id="modal1">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h5>Item has been added to your basket</h5>
            <p>⚠️ You may only request a quote as some of the items in your basket require us to contact the manufacturer
                for pricing information.</p>
            <br>
            <div class="modal-footer">
                <div class="d-flex">
                    <a class="ps-btn" href="{{ route('enquiry.index') }}">Go to enquiry basket</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('header')
    <style>
        .enquiry-notification a {
            font-weight: 700;
            color: #eb6228;
        }

        .enquiry-notification a:hover {
            color: #eb6328c0;
        }

        .gallery-image {
            display: flex;
            width: 100%;
        }

        .galleries {
            padding: 0px 0px 110px 0px;
            position: relative;
            width: 100%;
        }

        .detail-gallery {
            position: relative;
        }

        .detail-gallery {
            width: 100%;
            border: 1px solid #ddd;
            /* background-color: #fff; */
            border-radius: 4px;
        }

        .label {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
            border-radius: 30px;
            padding: 4px 10px;
            color: #ffffff;
            font-size: 12px;
            line-height: 12px;
            background-color: #FD9636;
        }


        .product-image-slider.slick-slider .slick-track figure {
            height: auto;
            padding: 0px 0px;
        }



        .product-image-slider-2.slick-slider .slick-track figure {
            height: 460px;
            display: flex;
            align-items: center;
            padding: 20px 0px;
        }

        .product-image-slider .slick-slide img,
        .product-image-slider-2 .slick-slide img {

            max-width: 99%;
            display: block;
            margin: auto;
            max-height: 100%;
        }

        .detail-gallery {
            position: relative;
        }

        .product-image-slider .slick-slide img,
        .product-image-slider-2 .slick-slide img {

            max-width: 99%;
            display: block;
            margin: auto;
            max-height: 100%;
        }



        .slider-nav-thumbnails {
            position: absolute;
            bottom: 0px;
            left: 0px;
            height: 105px;
            width: 225px;
            /*min-width: 100%;*/
            display: flex;
        }




        .slider-nav-thumbnails .slick-slide .item-thumb,
        .slider-nav-thumbnails-2 .slick-slide .item-thumb {
            height: 109px;
            border: 1px solid #DDE4F0;
            border-radius: 4px;
            margin-bottom: 16px;
            text-align: center;
            line-height: 108px;
            cursor: pointer;
        }

        .slider-nav-thumbnails .slick-slide .item-thumb.slick-current,
        .slider-nav-thumbnails .slick-slide .item-thumb:hover,
        .slider-nav-thumbnails-2 .slick-slide .item-thumb.slick-current,
        .slider-nav-thumbnails-2 .slick-slide .item-thumb:hover {
            border-color: #FD9636;
        }

        .slider-nav-thumbnails .slick-slide .item-thumb img,
        .slider-nav-thumbnails-2 .slick-slide .item-thumb img {
            display: inline-block;
            height: auto;
            max-width: 90%;
            vertical-align: middle;
            max-height: 90%;
        }

        .slider-nav-thumbnails .slick-prev,
        .slider-nav-thumbnails-2 .slick-prev {
            display: none !important;
        }

        .slider-nav-thumbnails .slick-next,
        .slider-nav-thumbnails-2 .slick-next {
            display: none !important;
        }

        .slick-initialized .slick-slide {
            text-align: center;
        }

        .product-image-slider.slick-slider .slick-track figure {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .product-image-slider-2.slick-slider .slick-track figure {
            /* height: 460px; */
            display: flex;
            align-items: center;
            padding: 20px 0px;
        }

        .product-image-slider .slick-slide img,
        .product-image-slider-2 .slick-slide img {
            /* display: inline-block;
                                                                                                                                                                                                                                                                                                vertical-align: middle;*/
            max-width: 99%;
            display: block;
            margin: auto;
            max-height: 100%;
        }


        @media (max-width: 449.98px) {

            .slider-nav-thumbnails {
                width: 100%;
                position: relative;
                top: auto;
                left: auto;
            }

            .slider-nav-thumbnails .slick-slide {
                padding: 0px 5px;
            }

            .slider-nav-thumbnails .slick-slide .item-thumb {
                margin-top: 15px;
            }

            .slider-nav-thumbnails .slick-slide .item-thumb {
                height: auto;
                line-height: 100%;
                padding: 5px;
            }

            .slider-nav-thumbnails {
                width: 75px;
            }
        }

        .slider-nav-thumbnails .slick-track {
            display: flex;
            height: 100% !important;
        }
    </style>

    <style>
        /* Modals */
        .modal {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: end;
            align-items: flex-start;
            z-index: 1000;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal.modal-show {
            animation: fadeIn 0.1s ease-in-out forwards;
        }

        .modal.modal-hide {
            animation: fadeOut 0.1s ease-in-out 0.1s forwards;
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: 2rem;
            padding: 2rem;
            border-radius: 0.25rem;
            width: 20%;
            max-height: 75%;
            overflow: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .modal.modal-show .modal-content {
            animation: fadeInDown 0.3s ease-in-out forwards;
        }

        .modal.modal-hide .modal-content {
            animation: fadeOutUp 0.2s ease-in-out forwards;
        }

        .modal-content h1 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .modal-content p {
            margin: 1rem 0;
            line-height: 1.5rem;
        }

        .modal-close {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 1.75rem;
            font-weight: bold;
            padding: 0 0.75rem;
            color: rgba(0, 0, 0, 0.2);
            cursor: pointer;
            user-select: none;
        }

        .modal-close:hover,
        .modal-close:focus {
            color: rgba(0, 0, 0, 0.5);
        }

        .modal:nth-of-type(2) {
            justify-content: initial;
            align-items: initial;
            background-color: transparent;
        }

        .modal:nth-of-type(2) .modal-content {
            margin: 0;
            padding: 2rem 5rem;
            border-radius: 0;
            box-shadow: initial;
            width: 100%;
            height: 100%;
            max-height: 100%;
            text-align: justify;
        }

        .modal:nth-of-type(2) .modal-close {
            font-size: 3rem;
            padding: 0;
            width: 3rem;
            height: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal:nth-of-type(2).modal-show {
            animation: none;
        }

        .modal:nth-of-type(2).modal-hide {
            animation: none;
        }

        .modal:nth-of-type(2).modal-show .modal-content {
            animation: zoomIn 0.3s ease-in-out forwards;
        }

        .modal:nth-of-type(2).modal-hide .modal-content {
            animation: zoomOut 0.2s ease-in-out forwards;
        }

        .modal:nth-of-type(3) {
            justify-content: flex-end;
            align-items: flex-end;
            background-color: transparent;
            overflow: hidden;
        }

        .modal:nth-of-type(3).modal-show {
            animation: none;
        }

        .modal:nth-of-type(3).modal-hide {
            animation: none;
        }

        .modal:nth-of-type(3).modal-show .modal-content {
            animation: fadeInLeft 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .modal:nth-of-type(3).modal-hide .modal-content {
            animation: fadeOutRight 0.2s ease-in-out forwards;
        }

        .modal:nth-of-type(4) .modal-content {
            padding: 0;
        }

        .modal:nth-of-type(4) .modal-header,
        .modal:nth-of-type(4) .modal-footer {
            background-color: steelblue;
            padding: 1rem;
            color: #fff;
            text-align: center;
        }

        .modal:nth-of-type(4) .modal-header h1 {
            margin: 0;
        }

        .modal:nth-of-type(4) .modal-body {
            padding: 1.25rem;
        }

        .modal:nth-of-type(4) .modal-close {
            color: rgba(255, 255, 255, 0.5);
        }

        .modal:nth-of-type(4) .modal-close:hover,
        .modal:nth-of-type(4) .modal-close:focus {
            color: rgba(255, 255, 255, 0.75);
        }

        .modal:nth-of-type(5) {
            justify-content: center;
            align-items: center;
        }

        .modal:nth-of-type(5) .modal-content {
            padding: 0;
            height: 80%;
            max-height: 80%;
            width: auto;
            max-width: 80%;
            overflow: visible;
            border: 3px solid #fff;
        }

        .modal:nth-of-type(5) .modal-content img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal:nth-of-type(5) .modal-close {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            width: 3rem;
            height: 3rem;
            font-size: 3rem;
            top: -1.5rem;
            right: -1.5rem;
            border-radius: 50%;
            color: #111;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
        }

        .modal:nth-of-type(5) .modal-close:hover,
        .modal:nth-of-type(5) .modal-close:focus {
            color: #111;
            /* color: rgba(255,0,0,0.5); */
        }

        .modal:nth-of-type(5).modal-show .modal-content {
            animation: zoomIn 0.3s ease-in-out forwards;
        }

        .modal:nth-of-type(5).modal-hide .modal-content {
            animation: zoomOut 0.2s ease-in-out forwards;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-3rem);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOutUp {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-3rem);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.3);
            }
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOutRight {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        /* Responsiveness */
        @media(max-width: 992px) {
            html {
                font-size: 14px;
            }

            .modal-content {
                width: 80%;
            }
        }

        @media(max-width:767px) {
            html {
                font-size: 12px;
            }

            .modal-content {
                padding: 2rem 1rem 1rem 1rem;
                width: 90%;
            }

            .modal-content h1 {
                margin-bottom: 1.5rem;
            }

            .modal:nth-of-type(2) .modal-content {
                padding: 2rem 3rem;
            }

            .modal:nth-of-type(3) {
                justify-content: center;
            }

            .modal:nth-of-type(3) .modal-content {
                width: 80%;
            }

            .modal:nth-of-type(5) .modal-content {
                max-width: 85%;
            }
        }
    </style>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.js"></script>

    <script>
        const modalTriggerButtons = document.querySelectorAll("[data-modal-target]");
        const modals = document.querySelectorAll(".modal");
        const modalCloseButtons = document.querySelectorAll(".modal-close");

        modalTriggerButtons.forEach(elem => {
            elem.addEventListener("click", event => toggleModal(event.currentTarget.getAttribute(
                "data-modal-target")));
        });
        modalCloseButtons.forEach(elem => {
            elem.addEventListener("click", event => toggleModal(event.currentTarget.closest(".modal").id));
        });
        modals.forEach(elem => {
            elem.addEventListener("click", event => {
                if (event.currentTarget === event.target) toggleModal(event.currentTarget.id);
            });
        });

        // Close Modal with "Esc"...
        document.addEventListener("keydown", event => {
            if (event.keyCode === 27 && document.querySelector(".modal.modal-show")) {
                toggleModal(document.querySelector(".modal.modal-show").id);
            }
        });

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);

            if (getComputedStyle(modal).display === "flex") { // alternatively: if(modal.classList.contains("modal-show"))
                modal.classList.add("modal-hide");
                setTimeout(() => {
                    document.body.style.overflow = "initial";
                    modal.classList.remove("modal-show", "modal-hide");
                    modal.style.display = "none";
                }, 200);
            } else {
                document.body.style.overflow = "hidden";
                modal.style.display = "flex";
                modal.classList.add("modal-show");
            }
        }
    </script>

    <script>
        $(".product-image-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: ".slider-nav-thumbnails"
        });

        $(".slider-nav-thumbnails").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".product-image-slider",
            dots: false,
            focusOnSelect: true,
            vertical: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
        });

        function addCart(slug) {
            variations = {};
            $("#option-choice-form input[type=radio]:checked").each(function() {
                if (this.checked == true) {
                    variations[this.name] = this.value
                }
            });
            count = parseInt($('.quantity-input').val());
            addToCart(slug, count, variations);
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
            productDetails();
            getVariantPrice();
            setTimeout(function() {
                getParts()
            }, 3000);
        });

        $('#option-choice-form input').on('change', function() {
            console.log('input change');
            console.log(parseInt($('.quantity-input').val()));
            getVariantPrice();
        });

        // function getVariantPrice() {
        //     if (parseInt($('.quantity-input').val()) > 0 && checkAddToCartValidity()) {
        //         $.ajax({
        //             type: "POST",
        //             url: '{{ route('products.variant_price') }}',
        //             data: $('#option-choice-form').serializeArray(),
        //             success: function(data) {

        //                 $('.product-gallery-thumb .carousel-box').each(function(i) {
        //                     if ($(this).data('variation') && data.variation == $(this).data(
        //                             'variation')) {
        //                         $('.product-gallery-thumb').slick('slickGoTo', i);
        //                     }
        //                 })

        //                 $('#option-choice-form #chosen_price_div').removeClass('d-none');
        //                 $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
        //                 $('#available-quantity').html(data.quantity);
        //                 $('.input-number').prop('max', data.max_limit);
        //                 if (parseInt(data.in_stock) == 0 && data.digital == 0) {
        //                     $('.buy-now').addClass('d-none');
        //                     $('.add-to-cart').addClass('d-none');
        //                     $('.out-of-stock').removeClass('d-none');
        //                 } else {
        //                     $('.buy-now').removeClass('d-none');
        //                     $('.add-to-cart').removeClass('d-none');
        //                     $('.out-of-stock').addClass('d-none');
        //                 }
        //             }
        //         });
        //     }
        // }

        function checkAddToCartValidity() {
            var names = {};
            $('#option-choice-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });

            if ($('#option-choice-form input:radio:checked').length == count) {
                return true;
            }

            return false;
        }


        function getVariantPrice() {
            if (parseInt($('.quantity-input').val()) > 0 && checkAddToCartValidity()) {
                // var data = $('#option-choice-form').serializeArray();

                data = {};
                $("#option-choice-form input[type=radio]:checked").each(function() {
                    if (this.checked == true) {
                        data[this.name] = this.value
                    }
                });
                data['quantity'] = parseInt($('.quantity-input').val())
                data['id'] = {{ $product->id }}

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{ route('products.variant_price') }}',
                    data: data,
                    success: function(data) {
                        if (data.status == 200) {
                            $('#product_price').html(data.price);
                            $('.quantity-input').data('max', data.max_limit);
                            $('#sku').html(data.sku);
                            if (parseInt(data.in_stock) == 0 || data.price_int == 0) {
                                $('.ps-product__shopping figure').addClass('d-none');
                                $('#add-to-cart').addClass('d-none');
                                $('#product_price').addClass('d-none');
                            } else {
                                $('.ps-product__shopping figure').removeClass('d-none');
                                $('#add-to-cart').removeClass('d-none');
                                $('#product_price').removeClass('d-none');
                            }
                        }

                    }
                });
            }
        }

        function checkAddToCartValidity() {
            var names = {};
            $('#option-choice-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });

            if ($('#option-choice-form input:radio:checked').length == count) {
                return true;
            }

            return false;
        }

        var productDetails = function() {
            // $slick_slider_1.slick({
            //     slidesToShow: 1,
            //     slidesToScroll: 1,
            //     arrows: false,
            //     fade: false,
            //     asNavFor: ".slider-nav-thumbnails-2"
            // });
            // $slick_slider_2.slick({
            //     slidesToShow: 4,
            //     slidesToScroll: 1,
            //     asNavFor: ".product-image-slider-2",
            //     dots: false,
            //     focusOnSelect: true,
            //     vertical: false,
            //     adaptiveHeight: false,
            //     prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            //     nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
            // });



            $(".product-image-slider").on("beforeChange", function(event, slick, currentSlide, nextSlide) {
                var img = $(slick.$slides[nextSlide]).find("img");
                $(".zoomWindowContainer,.zoomContainer").remove();
                $(img).elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            });
            //Elevate Zoom
            if ($(".product-image-slider").length) {
                $(".product-image-slider .slick-active img").elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            }
        };
    </script>
@endpush
