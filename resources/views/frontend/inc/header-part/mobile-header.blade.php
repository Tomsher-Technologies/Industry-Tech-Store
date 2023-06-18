
    <header class="header header--mobile" data-sticky="true">
        <div class="header__top">
            <div class="header__left">
                <p>Welcome to ITS Online Shopping Store !</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="#">Sell on ITS</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navigation--mobile">
            <div class="navigation__left">

                <a class="ps-logo" href="{{ route('home') }}" title="Home">
                    <img src="{{ frontendAsset('img/logo_new.webp') }}" alt="{{ env('APP_NAME') }}"
                        width="150">
                </a>
            </div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i
                                class="icon-bag2"></i><span><i>0</i></span></a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{ frontendAsset('img/products/clothing/7.jpg') }}"
                                                alt="" /></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove"
                                            href="#"><i class="icon-cross"></i></a><a
                                            href="product-default.html">MVMTH
                                            Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> Portagas</p><small>1 x AED59.99</small>
                                    </div>
                                </div>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{ frontendAsset('img/products/clothing/5.jpg') }}"
                                                alt="" /></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove"
                                            href="#"><i class="icon-cross"></i></a><a
                                            href="product-default.html">Sleeve Linen
                                            Blend Caro Pane Shirt</a>
                                        <p><strong>Sold by:</strong> Portagas</p><small>1 x AED59.99</small>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>AED59.99</strong></h3>
                                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn"
                                        href="checkout.html">Checkout</a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><a href="my-account.html"><i class="icon-user"></i></a></div>
                        <div class="ps-block__right"><a href="my-account.html">Login</a><a
                                href="my-account.html">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something..." />
                    <button aria-label="Search"><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
    </header>
    <div class="ps-site-overlay"></div>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#"><img
                                    src="{{ frontendAsset('img/products/shop/02.jpg') }}" alt=""></a>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                    class="icon-cross"></i></a><a href="product-default.html">Schneider TeSys F
                                contactor - 3P - LC1F400M7
                            </a>
                            <p><strong>Sold by:</strong> TYCO </p><small>1 x AED59.99</small>
                        </div>
                    </div>
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>AED59.99</strong></h3>
                    <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn"
                            href="checkout.html">Checkout</a></figure>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <div class="menu--product-categories">
                <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Categories</span></div>
                <div class="menu__content">
                    <ul class="menu--mobile">


                        <li class="menu-item-has-children has-mega-menu"><a href="#">Automation and
                                Control</a><span class="sub-toggle"></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <h4>Engine/Steering Controls<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">




                                        <li><a href="#.html">Steering Control System</a></li>
                                        <li><a href="#.html">Engine Control System</a></li>
                                        <li><a href="#.html">Steering Gear Alarm</a></li>
                                        <li><a href="#.html">Steering Gear System</a></li>
                                        <li><a href="#.html">Sensors</a></li>
                                        <li><a href="#.html">Sensors</a></li>
                                        <li><a href="#.html">Inverters</a></li>
                                        <li><a href="#.html">Inverters</a></li>

                                    </ul>
                                </div>

                                <div class="mega-menu__column">
                                    <h4>Valve Positioners<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">

                                        <li><a href="#.html"> Air Filter Regulator</a></li>
                                        <li><a href="#.html"> Air Filter Regulator</a></li>
                                        <li><a href="#.html"> Air Volume Booster</a></li>
                                        <li><a href="#.html"> Electro Pneumatic Positioners</a></li>
                                        <li><a href="#.html"> I/P Converter</a></li>
                                        <li><a href="#.html"> Lock up Valve</a></li>
                                        <li><a href="#.html"> Pneumatic Positioners</a></li>
                                        <li><a href="#.html"> Position Transmitter</a></li>
                                        <li><a href="#.html"> Smart Valve positioner</a></li>
                                        <li><a href="#.html"> Solenoid Valve</a></li>
                                        <li><a href="#.html"> Relay</a></li>
                                        <li><a href="#.html"> Valve Positioner Motor</a></li>
                                    </ul>
                                </div>


                                <div class="mega-menu__column">
                                    <h4>Measuring & Control Instruments<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">

                                        <li><a href="#.html"> Bargraph digital display</a></li>
                                        <li><a href="#.html"> Cable float switch</a></li>
                                        <li><a href="#.html"> Cooling Water Monitor</a></li>
                                        <li><a href="#.html"> Float Level Switch</a></li>
                                        <li><a href="#.html"> Level Transmitter</a></li>
                                        <li><a href="#.html"> Oil Content Monitor</a></li>
                                        <li><a href="#.html"> Oil Discharge Monitor</a></li>
                                        <li><a href="#.html"> Pressure Switch</a></li>
                                        <li><a href="#.html"> Pressure Transmitter</a></li>
                                        <li><a href="#.html"> Side Mounting Float Switch</a></li>
                                        <li><a href="#.html"> Temperature Controller</a></li>
                                        <li><a href="#.html"> Temperature Switch</a></li>
                                        <li><a href="#.html"> Temperature Transmitter</a></li>
                                        <li><a href="#.html"> Thermocouple and RTD</a></li>
                                        <li><a href="#.html"> Vertical Float Switch</a></li>
                                        <li><a href="#.html"> Wash Water Monitor</a></li>
                                        <li><a href="#.html"> Alarm Monitor</a></li>
                                        <li><a href="#.html"> RPM Meter</a></li>
                                        <li><a href="#.html"> Level Switch</a></li>
                                        <li><a href="#.html"> Magnetic Float Level Switch</a></li>
                                        <li><a href="#.html"> Bilge Level Switch</a></li>

                                    </ul>
                                </div>


                            </div>
                        </li>

                        <li><a href="#.html"> Gas Detection</a>
                        </li>
                        <li><a href="#.html"> Categories</a>
                        </li>
                        <li><a href="#.html"> Fixed Gas Detection Systems</a>
                        </li>
                        <li><a href="#.html"> Portable Gas Detectors </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--+createMenu(product_categories, 'menu--mobile')-->
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content">
            <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
                <i class="icon-menu"></i>
                <span> Menu</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
                <i class="icon-list4"></i>
                <span> Categories</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
                <i class="icon-magnifier"></i>
                <span>
                    Search</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
                <i class="icon-bag2"></i>
                <span>
                    Cart</span>
            </a>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>


        <div class="ps-panel__content">
            <ul class="menu--mobile">

                <li class="menu-item-has-children"><a href="index">Fire Detection</a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children"><a href="index"> Gas Detection </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children"><a href="index"> Calibration Gas </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>


                <li class="menu-item-has-children"><a href="index"> Airloop System </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>


                <li class="menu-item-has-children"><a href="index"> Sounders & Beacons </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>


                <li class="menu-item-has-children"><a href="index"> Automation and Control </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>



                <li class="menu-item-has-children"><a href="index"> Light Fixtures </a><span
                        class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html"> Addressable Control Panel</a></li>
                        <li><a href="index.html"> Audible and Visual Alarm</a></li>
                        <li><a href="index.html"> Base</a></li>
                        <li><a href="index.html"> Conventional Control Panel</a></li>
                        <li><a href="index.html"> Detector Testers</a></li>
                        <li><a href="index.html"> Firebell</a></li>
                        <li><a href="index.html"> Flame Detector</a></li>
                        <li><a href="index.html"> Heat Detector</a></li>
                        <li><a href="index.html"> Manual Call Point</a></li>
                        <li><a href="index.html"> Optical Smoke & Heat Detector</a></li>
                        <li><a href="index.html"> Smoke Detector</a></li>
                        <li><a href="index.html"> Other Accessories</a></li>

                    </ul>
                </li>



            </ul>
        </div>
    </div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <!-- header end -->
