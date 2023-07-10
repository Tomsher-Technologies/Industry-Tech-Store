    <!-- header start -->
    <header class="header header--1 header--standards" data-sticky="true">
        @include('frontend.inc.header-part.header-top')
        <nav class="navigation navbar">
            <div class="ps-container">
                <div class="navigation__left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle"><i class="fa fa-bars"></i><span> Shop by Categories</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">

                                @foreach (getAllCategories()->where('parent_id', 0) as $item)
                                    @if ($item->child->count())
                                        <li class="menu-item-has-children has-mega-menu">
                                            <a title="{{ $item->name }}"
                                                href="{{ route('products.category', $item->slug) }}">{{ $item->name }}</a>
                                            <span class="sub-toggle"></span>
                                            <div class="mega-menu mega-menu-large">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h4>Engine/Steering Controls<span class="sub-toggle"></span>
                                                        </h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html">Engine/Steering Controls</a>
                                                            </li>
                                                            <li><a href="#.html">Steering Control System</a>
                                                            </li>
                                                            <li><a href="#.html">Engine Control System</a>
                                                            </li>
                                                            <li><a href="#.html">Steering Gear Alarm</a>
                                                            </li>
                                                            <li><a href="#.html">Steering Gear System</a>
                                                            </li>
                                                        </ul>
                                                        <h4>Sensors<span class="sub-toggle"></span></h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html"> Sensors</a></li>
                                                        </ul>

                                                        <h4>Inverters<span class="sub-toggle"></span></h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html"> Inverters</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4>Valve Positioners<span class="sub-toggle"></span></h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html"> Air Filter Regulator</a>
                                                            </li>
                                                            <li><a href="#.html"> Air Filter Regulator</a>
                                                            </li>
                                                            <li><a href="#.html">Air Volume Booster</a></li>
                                                            <li><a href="#.html">Electro Pneumatic Positioners</a></li>
                                                            <li><a href="#.html">I/P Converter</a></li>
                                                            <li><a href="#.html">Lock up Valve</a></li>
                                                            <li><a href="#.html">Pneumatic Positioners</a></li>
                                                            <li><a href="#.html">Position Transmitter</a></li>
                                                            <li><a href="#.html">Smart Valve positioner</a></li>
                                                            <li><a href="#.html">Solenoid Valve</a></li>
                                                            <li><a href="#.html">Relay</a></li>
                                                            <li><a href="#.html">Valve Positioner Motor</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4>Measuring & Control Instruments<span
                                                                class="sub-toggle"></span>
                                                        </h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html">Bargraph digital display</a></li>
                                                            <li><a href="#.html">Cable float switch </a></li>
                                                            <li><a href="#.html">Cooling Water Monitor </a></li>
                                                            <li><a href="#.html">Float Level Switch </a></li>
                                                            <li><a href="#.html">Level Transmitter </a></li>
                                                            <li><a href="#.html">Oil Content Monitor </a></li>
                                                            <li><a href="#.html">Oil Discharge Monitor </a></li>
                                                            <li><a href="#.html">Pressure Switch </a></li>
                                                            <li><a href="#.html">Pressure Transmitter </a></li>
                                                            <li><a href="#.html">Side Mounting Float Switch </a></li>
                                                            <li><a href="#.html">Temperature Controller </a></li>
                                                            <li><a href="#.html">Temperature Switch </a></li>
                                                            <li><a href="#.html">Temperature Transmitter </a></li>
                                                            <li><a href="#.html">Thermocouple and RTD </a></li>
                                                            <li><a href="#.html">Vertical Float Switch </a></li>
                                                            <li><a href="#.html">Wash Water Monitor </a></li>
                                                            <li><a href="#.html">Alarm Monitor </a></li>
                                                            <li><a href="#.html">RPM Meter </a></li>
                                                            <li><a href="#.html">Level Switch </a></li>
                                                            <li><a href="#.html">Magnetic Float Level Switch </a></li>
                                                            <li><a href="#.html">Bilge Level Switch </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4>Gauges<span class="sub-toggle"></span></h4>
                                                        <ul class="mega-menu__list">
                                                            <li><a href="#.html"> Pressure Gauges </a></li>
                                                            <li><a href="#.html"> Temperature Gauges </a></li>
                                                            <li><a href="#.html"> Hour Meters </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <a
                                                href="{{ route('products.category', $item->slug) }}">{{ $item->name }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- <li class="menu-item-has-children has-mega-menu"><a href="#">Automation and
                                        Control</a><span class="sub-toggle"></span>
                                    <div class="mega-menu mega-menu-large">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h4>Engine/Steering Controls<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html">Engine/Steering Controls</a>
                                                    </li>
                                                    <li><a href="#.html">Steering Control System</a>
                                                    </li>
                                                    <li><a href="#.html">Engine Control System</a>
                                                    </li>
                                                    <li><a href="#.html">Steering Gear Alarm</a>
                                                    </li>
                                                    <li><a href="#.html">Steering Gear System</a>
                                                    </li>
                                                </ul>
                                                <h4>Sensors<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html"> Sensors</a></li>
                                                </ul>

                                                <h4>Inverters<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html"> Inverters</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Valve Positioners<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html"> Air Filter Regulator</a>
                                                    </li>
                                                    <li><a href="#.html"> Air Filter Regulator</a>
                                                    </li>
                                                    <li><a href="#.html">Air Volume Booster</a></li>
                                                    <li><a href="#.html">Electro Pneumatic Positioners</a></li>
                                                    <li><a href="#.html">I/P Converter</a></li>
                                                    <li><a href="#.html">Lock up Valve</a></li>
                                                    <li><a href="#.html">Pneumatic Positioners</a></li>
                                                    <li><a href="#.html">Position Transmitter</a></li>
                                                    <li><a href="#.html">Smart Valve positioner</a></li>
                                                    <li><a href="#.html">Solenoid Valve</a></li>
                                                    <li><a href="#.html">Relay</a></li>
                                                    <li><a href="#.html">Valve Positioner Motor</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Measuring & Control Instruments<span class="sub-toggle"></span>
                                                </h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html">Bargraph digital display</a></li>
                                                    <li><a href="#.html">Cable float switch </a></li>
                                                    <li><a href="#.html">Cooling Water Monitor </a></li>
                                                    <li><a href="#.html">Float Level Switch </a></li>
                                                    <li><a href="#.html">Level Transmitter </a></li>
                                                    <li><a href="#.html">Oil Content Monitor </a></li>
                                                    <li><a href="#.html">Oil Discharge Monitor </a></li>
                                                    <li><a href="#.html">Pressure Switch </a></li>
                                                    <li><a href="#.html">Pressure Transmitter </a></li>
                                                    <li><a href="#.html">Side Mounting Float Switch </a></li>
                                                    <li><a href="#.html">Temperature Controller </a></li>
                                                    <li><a href="#.html">Temperature Switch </a></li>
                                                    <li><a href="#.html">Temperature Transmitter </a></li>
                                                    <li><a href="#.html">Thermocouple and RTD </a></li>
                                                    <li><a href="#.html">Vertical Float Switch </a></li>
                                                    <li><a href="#.html">Wash Water Monitor </a></li>
                                                    <li><a href="#.html">Alarm Monitor </a></li>
                                                    <li><a href="#.html">RPM Meter </a></li>
                                                    <li><a href="#.html">Level Switch </a></li>
                                                    <li><a href="#.html">Magnetic Float Level Switch </a></li>
                                                    <li><a href="#.html">Bilge Level Switch </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Gauges<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html"> Pressure Gauges </a></li>
                                                    <li><a href="#.html"> Temperature Gauges </a></li>
                                                    <li><a href="#.html"> Hour Meters </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item-has-children has-mega-menu"><a href="#"> Gas
                                        Detection</a><span class="sub-toggle"></span>
                                    <div class="mega-menu mega-menu-medium">
                                        <div class="row g-0">

                                            <div class="col-md-6">
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html">
                                                            <h4>Fixed Gas Detection Systems<span
                                                                    class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Portable Gas Detectors<span class="sub-toggle"></span>
                                                            </h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Gas Detection Tubes<span class="sub-toggle"></span>
                                                            </h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Wireless Gas Detectors<span class="sub-toggle"></span>
                                                            </h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Accessories<span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="w-100 h-100"
                                                    src="{{ frontendAsset('img/banner/banner-vertical-02.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item-has-children has-mega-menu"><a href="#"> Fire
                                        Detection</a><span class="sub-toggle"></span>
                                    <div class="mega-menu mega-menu-medium">
                                        <div class="row g-0">

                                            <div class="col-md-6">
                                                <ul class="mega-menu__list">
                                                    <li><a href="#.html">
                                                            <h4> Addressable Control Panel<span
                                                                    class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Audible and Visual Alarms<span
                                                                    class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Base<span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Conventional Control Panel<span
                                                                    class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4> Detector Testers <span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Firebell <span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Flame Detector <span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4> Heat Detector <span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4> Manual Call Point <span class="sub-toggle"></span>
                                                            </h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4>Optical Smoke & Heat Detector <span
                                                                    class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4> Smoke Detector <span class="sub-toggle"></span></h4>
                                                        </a></li>
                                                    <li><a href="#.html">
                                                            <h4> Other Accessories <span class="sub-toggle"></span>
                                                            </h4>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="w-100 h-100"
                                                    src="{{ frontendAsset('img/banner/banner-vertical-01.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#.html"> Gas Detection</a>
                                <li><a href="#.html"> Calibration</a>
                                <li><a href="#.html"> Airloop System</a>
                                <li><a href="#.html"> Sounders & Beacons</a>
                                <li><a href="#.html"> Automation and Control</a>
                                <li><a href="#.html"> Light Fixtures</a>
                                <li><a href="#.html"> Personal Protective Equipment</a>
                                <li><a href="#.html"> Communication System</a>
                                <li><a href="#.html"> UTI Level Gauges</a>
                                <li><a href="#.html"> Life Safety Products</a>
                                <li><a href="#.html"> Temperature/Pressure Calibrators</a>
                                <li><a href="#.html"> Alcohol Test Kits</a>
                                <li><a href="#.html"> Electrical</a> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navigation__right">
                    <ul class="menu">
                        <li class="menu-item-has-children has-mega-menu"><a> Fire Detection</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">
                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html">Addressable Control Panel </a></li>
                                        <li><a href="shop-default.html">Audible and Visual Alarm </a></li>
                                        <li><a href="shop-default.html">Base </a></li>
                                        <li><a href="shop-default.html">Conventional Control Panel </a></li>
                                        <li><a href="shop-default.html">Detector Testers </a></li>
                                        <li><a href="shop-default.html">Firebell </a></li>
                                        <li><a href="shop-default.html">Flame Detector </a></li>
                                        <li><a href="shop-default.html">Heat Detector </a></li>
                                        <li><a href="shop-default.html">Manual Call Point </a></li>
                                        <li><a href="shop-default.html">Optical Smoke & Heat Detector</a></li>
                                        <li><a href="shop-default.html">Smoke Detector</a></li>
                                        <li><a href="shop-default.html">Other Accessories</a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-01.jpg') }}" alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href="">
                                                    <img class="w-100" src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href="">
                                                    <img class="w-100" src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="menu-item-has-children has-mega-menu"><a> Gas Detection</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Fixed Gas Detection Systems</a></li>
                                        <li><a href="shop-default.html"> Portable Gas Detectors</a></li>
                                        <li><a href="shop-default.html"> Gas Detection Tubes</a></li>
                                        <li><a href="shop-default.html"> Wireless Gas Detectors</a></li>
                                        <li><a href="shop-default.html"> Accessories</a></li>

                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-02.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="menu-item-has-children has-mega-menu"><a> Calibration Gas</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories <span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Calibration Gas – Airproducts, Portagas</a>
                                        </li>
                                        <li><a href="shop-default.html"> Carry Case</a></li>


                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-02.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item-has-children has-mega-menu"><a> Airloop System</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Breathing Apparatus</a></li>

                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-02.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>



                        <li class="menu-item-has-children has-mega-menu"><a> Sounders & Beacons</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Signal Light and Horn </a></li>
                                        <li><a href="shop-default.html"> Weatherproof Signal Beacon </a></li>
                                        <li><a href="shop-default.html"> Heavy Duty Sounder </a></li>
                                        <li><a href="shop-default.html"> Alarm Bell & Beacon </a></li>
                                        <li><a href="shop-default.html"> Warning lights </a></li>
                                        <li><a href="shop-default.html"> Electronic Sounders </a></li>
                                        <li><a href="shop-default.html"> Electric Horn </a></li>
                                        <li><a href="shop-default.html"> Ex ploof sounder beacons </a></li>
                                        <li><a href="shop-default.html">Signal Beacon </a></li>
                                        <li><a href="shop-default.html">Limit switches </a></li>
                                        <li><a href="shop-default.html">Air Horn </a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-02.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>



                        <li class="menu-item-has-children has-mega-menu"><a> Automation and Control</a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Engine/Steering Controls </a></li>
                                        <li><a href="shop-default.html"> Valve Positioners </a></li>
                                        <li><a href="shop-default.html"> Inverters </a></li>
                                        <li><a href="shop-default.html"> Measuring & Control Instruments </a></li>
                                        <li><a href="shop-default.html"> Gauges </a></li>
                                        <li><a href="shop-default.html"> Sensors </a></li>

                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-01.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item-has-children has-mega-menu"><a> Light Fixtures </a><span
                                class="sub-toggle"></span>
                            <div class="mega-menu">

                                <div class="mega-menu__columnone">
                                    <h4>Categories<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="shop-default.html"> Bed lamp </a></li>
                                        <li><a href="shop-default.html"> Ceiling Lights </a></li>
                                        <li><a href="shop-default.html"> Explosion Proof Tubelights </a></li>
                                        <li><a href="shop-default.html"> Flood Lights </a></li>
                                        <li><a href="shop-default.html"> Navigation lights </a></li>
                                        <li><a href="shop-default.html"> Pendant lights </a></li>
                                        <li><a href="shop-default.html"> Searchlights </a></li>
                                        <li><a href="shop-default.html"> Spot Lights </a></li>
                                        <li><a href="shop-default.html"> Electric Connectors </a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu__columntwo">
                                    <img class="w-100 h-100"
                                        src="{{ frontendAsset('img/banner/banner-vertical-01.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mega-menu__columnthree">
                                    <div class="menu-shop-brands">
                                        <div class="row">
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>

                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/01.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/02.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/03.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/04.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/05.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/07.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/08.jpg') }}"
                                                        alt=""></a></div>
                                            <div class="brand col-lg-4"><a href=""><img class="w-100"
                                                        src="{{ frontendAsset('img/brand/09.jpg') }}"
                                                        alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-menu__columnfour">
                                    <div class="row">
                                        <div class="col-md-12 pb-5"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-2.jpg') }}"
                                                alt="" /> </div>
                                        <div class="col-md-12"> <img class="w-100"
                                                src="{{ frontendAsset('img/slider/home-1/promotion-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>




                    @if (get_setting('show_currency_switcher') == 'on')
                        @php
                            $currentCurrency = getCurrentCurrency();
                            // dd($currentCurrency);
                        @endphp
                        <ul class="navigation__extra" id="currency-change">
                            <li>
                                <div class="ps-dropdown">
                                    <a
                                        href="#">{{ $currentCurrency->name }}{{ $currentCurrency->symbol }}</a>
                                    <ul class="ps-dropdown-menu">
                                        @foreach (\App\Models\Currency::where('status', 1)->get() as $key => $currency)
                                            <li>
                                                <a class=" @if ($currentCurrency->code == $currency->code) active @endif"
                                                    href="javascript:void(0)"
                                                    data-currency="{{ $currency->code }}">{{ $currency->name }}
                                                    ({{ $currency->symbol }})
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
    </header>
