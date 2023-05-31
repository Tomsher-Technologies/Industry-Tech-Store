@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title ?? $detailedProduct->name }}@endsection

@section('meta_description'){{ $detailedProduct->meta_description }}@endsection

@section('meta_keywords'){{ $detailedProduct->tags }}@endsection

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
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
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('content')
    <nav class="navigation--mobile-product">
        <a class="ps-btn ps-btn--black" href="shopping-cart.html">Add to cart</a>
        <a class="ps-btn" href="checkout.html">Buy Now</a>
    </nav>

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="shop-default.html">Consumer Electrics</a></li>
                <li><a href="shop-default.html">Refrigerators</a></li>
                <li>
                    SHD Bulb Revolving Warning light and Electric Horn Combination for
                    Vessels and Heavy Industry Applications
                </li>
            </ul>
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
                            </div>
                            <div class="ps-product__info">
                                <h1>
                                    Qlight SHD-WS Weatherproof Warning Light with Siren –
                                    SHD-24VDC
                                </h1>
                                <div class="ps-product__meta">
                                    <p>Brand:<a href="shop-default.html">Qlight</a></p>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>(1 review)</span>
                                    </div>
                                </div>
                                <h4 class="ps-product__price">AED1000</h4>
                                <div class="ps-product__desc">
                                    <ul class="ps-list--dot">
                                        <li>
                                            Warning light and electric horn combination models for
                                            vessels and heavy industries applications
                                        </li>
                                        <li>
                                            Aluminum housing and polycarbonate lens material
                                            provides excellent durability under seismic conditions
                                        </li>
                                        <li>
                                            Can adjust sound volume and select sound pattern with
                                            the switches built inside the products
                                        </li>
                                        <li>
                                            You can select a variety of sound and light
                                            sources(bulb, LED and xenon)
                                        </li>
                                    </ul>
                                </div>

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
                                        <a href="#"><i class="icon-heart"></i></a><a href="#"><i
                                                class="icon-chart-bars"></i></a>
                                    </div>
                                </div>
                                <div class="ps-product__specification">
                                    <p><strong>SKU:</strong> SHD-WS-123456</p>
                                    <p class="categories">
                                        <strong> Categories:</strong><a href="#">Qlight</a>,<a href="#">
                                            Signal Light</a>,<a href="#">Electric Horn</a>
                                    </p>
                                    <p class="tags">
                                        <strong> Tags</strong><a href="#">Aluminum </a>,<a
                                            href="#">Polycarbonate </a>,<a href="#">Shock resistance</a>
                                    </p>
                                </div>
                                <div class="ps-product__sharing">
                                    <a class="facebook" href="#">
                                        <i class="fab fa-facebook"></i></a>
                                    <a class="twitter" href="#">
                                        <i class="fab fa-twitter"></i></a>
                                    <a class="linkedin" href="#">
                                        <i class="fab fa-linkedin"></i></a>
                                    <a class="instagram" href="#">
                                        <i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                <li><a href="#tab-2">Specification</a></li>
                                <li><a href="#tab-3">Vendor</a></li>
                                <li><a href="#tab-4">Reviews (1)</a></li>
                                <li><a href="#tab-5">Questions and Answers</a></li>
                                <li><a href="#tab-6">More Offers</a></li>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                        <img class="mb-30" src="img/products/detail/content/description.jpg"
                                            alt="" />
                                        <h5>What do you get</h5>
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                        <h5>Perfectly Done</h5>
                                        <p>
                                            Meanwhile, the IP68 water resistance has improved from
                                            the S5, allowing submersion of up to five feet for 30
                                            minutes, plus there’s no annoying flap covering the
                                            charging port
                                        </p>
                                        <ul class="pl-0">
                                            <li>
                                                No FM radio (except for T-Mobile units in the US, so
                                                far)
                                            </li>
                                            <li>No IR blaster</li>
                                            <li>No stereo speakers</li>
                                        </ul>
                                        <p>
                                            Qlight SHD-WS Warning/Signal Light and Electric Horn
                                            combinations with excellent durability and perfectly
                                            enclosed structure, designed for vessels and heavy
                                            industry applications. Aluminum housing and
                                            polycarbonate lens material provide excellent durability
                                            under seismic conditions. Adjustable sound volume and
                                            selectable sound pattern with the switches built inside
                                            the products.
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered ps-table ps-table--specification">
                                            <tbody>
                                                <tr>
                                                    <td>Product</td>
                                                    <td>Warning/Signal Light</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>Qlight</td>
                                                </tr>
                                                <tr>
                                                    <td>Model</td>
                                                    <td>SHD-WS</td>
                                                </tr>
                                                <tr>
                                                    <td>Materials</td>
                                                    <td>
                                                        Lens-PC, Housing-Al, Protection cage-SUS316L,
                                                        Reflector-PC, Multi-tiered reflector-Heat
                                                        resistance ABS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Standard housing color</td>
                                                    <td>MUNSELL No. 7.5BG 7/2</td>
                                                </tr>
                                                <tr>
                                                    <td>Cable entry</td>
                                                    <td>1/2′′PF</td>
                                                </tr>
                                                <tr>
                                                    <td>Protection rating</td>
                                                    <td>IP66</td>
                                                </tr>
                                                <tr>
                                                    <td>Certificates</td>
                                                    <td>KIMM, ABS, CE Compliant</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-3">
                                    <h4>GoPro</h4>
                                    <p>
                                        Digiworld US, New York’s no.1 online retailer was
                                        established in May 2012 with the aim and vision to become
                                        the one-stop shop for retail in New York with
                                        implementation of best practices both online
                                    </p>
                                    <a href="#">More Products from gopro</a>
                                </div>
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>4.00</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>1 Review</span>
                                                </div>
                                                <div class="ps-block__star">
                                                    <span>5 Star</span>
                                                    <div class="ps-progress" data-value="100">
                                                        <span></span>
                                                    </div>
                                                    <span>100%</span>
                                                </div>
                                                <div class="ps-block__star">
                                                    <span>4 Star</span>
                                                    <div class="ps-progress" data-value="0">
                                                        <span></span>
                                                    </div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star">
                                                    <span>3 Star</span>
                                                    <div class="ps-progress" data-value="0">
                                                        <span></span>
                                                    </div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star">
                                                    <span>2 Star</span>
                                                    <div class="ps-progress" data-value="0">
                                                        <span></span>
                                                    </div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star">
                                                    <span>1 Star</span>
                                                    <div class="ps-progress" data-value="0">
                                                        <span></span>
                                                    </div>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                            <form class="ps-form--review" action="index.html" method="get">
                                                <h4>Submit Your Review</h4>
                                                <p>
                                                    Your email address will not be published. Required
                                                    fields are marked<sup>*</sup>
                                                </p>
                                                <div class="form-group form-group__rating">
                                                    <label>Your rating of this product</label>
                                                    <select class="ps-rating" data-read-only="false">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text"
                                                                placeholder="Your Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="email"
                                                                placeholder="Your Email" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group submit">
                                                    <button class="ps-btn">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-5">
                                    <div class="ps-block--questions-answers">
                                        <h3>Questions and Answers</h3>
                                        <div class="form-group">
                                            <input class="form-control" type="text"
                                                placeholder="Have a question? Search for answer?" />
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab active" id="tab-6">
                                    <p>Sorry no more offers available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
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
                </div>
            </div>
            <div class="ps-section--default ps-customer-bought">
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
            </div>
        </div>
    </div>
@endsection
