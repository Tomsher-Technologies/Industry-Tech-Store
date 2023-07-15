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
                                    {{-- <li>
                                        <a href="{{ route('products.category', $item->slug) }}">{{ $item->name }}</a>
                                    </li> --}}
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

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navigation__right">
                    <ul class="menu">

                        @php
                            $header_menu = getMenu(1);
                        @endphp

                        @foreach ($header_menu as $menu)
                            @if ($menu['child'])
                                <li class="menu-item-has-children has-mega-menu">
                                    <a title="{{ $menu['label'] }}">{{ $menu['label'] }}</a>
                                    <span class="sub-toggle"></span>
                                    <div class="mega-menu">
                                        <div class="mega-menu__columnone">
                                            <h4>Categories<span class="sub-toggle"></span></h4>
                                            <ul class="mega-menu__list">

                                                @foreach ($menu['child'] as $child)
                                                    <li class="">
                                                        <a href="{{ $child['link'] }}" title="{{ $child['label'] }}">
                                                            {{ $child['label'] }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        @if ($menu['img_1'] !== null)
                                            <div class="mega-menu__columntwo">
                                                <a href="{{ $menu['img_1_link'] }}">
                                                    <img class="w-100 h-100" src="{{ $menu['img_1_src'] }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        @endif
                                        @if ($menu['brands'] !== null)
                                            <div class="mega-menu__columnthree">
                                                <div class="menu-shop-brands">
                                                    <div class="row">

                                                        @foreach ($menu['brands'] as $item)
                                                            <div class="brand col-lg-4">
                                                                <a href="{{ route('products.brand', $item->slug) }}">
                                                                    <img class="w-100"
                                                                        src="{{ get_uploads_image($item->logoImage) }}"
                                                                        alt="{{ $item->name }}">
                                                                </a>
                                                            </div>
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($menu['img_2'] || $menu['img_3'])
                                            <div class="mega-menu__columnfour">
                                                <div class="row">
                                                    @if ($menu['img_2'] !== null)
                                                        <div class="col-md-12 pb-5">
                                                            <a href="{{ $menu['img_2_link'] }}">
                                                                <img class="w-100" src="{{ $menu['img_2_src'] }}"
                                                                    alt="{{ $menu['label'] }}" />
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if ($menu['img_3'] !== null)
                                                        <div class="col-md-12">
                                                            <a href="{{ $menu['img_3_link'] }}">
                                                                <img class="w-100" src="{{ $menu['img_3_src'] }}"
                                                                    alt="{{ $menu['label'] }}" />
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $menu['link'] }}" title="{{ $menu['label'] }}">{{ $menu['label'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                    @if (get_setting('show_currency_switcher') == 'on')
                        @php
                            $currentCurrency = getCurrentCurrency();
                            // Session:has('currentCurrency', $currentCurrency->code)
                            session(['currency_code' => $currentCurrency->code]);
                        @endphp
                        <ul class="navigation__extra" id="currency-change">
                            <li>
                                <div class="ps-dropdown">
                                    <a href="#">{{ $currentCurrency->name }}{{ $currentCurrency->symbol }}</a>
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
