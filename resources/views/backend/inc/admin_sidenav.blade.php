<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if (get_setting('system_logo_white') != null)
                    <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon"
                        alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon"
                        alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text"
                    name="" placeholder="Search in menu" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- POS Addon-->
                @if (addon_is_activated('pos_system'))
                    @if (Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">POS System</span>
                                @if (env('DEMO_MODE') == 'On')
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('poin-of-sales.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create']) }}">
                                        <span class="aiz-side-nav-text">POS Manager</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('poin-of-sales.activation') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">POS Configuration</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

                <!-- Product -->
                @if (Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Products</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('products.create') }}">
                                    <span class="aiz-side-nav-text">Add New product</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('products.all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">All Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('categories.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit']) }}">
                                    <span class="aiz-side-nav-text">Category</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('brands.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit']) }}">
                                    <span class="aiz-side-nav-text">Brand</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('attributes.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index', 'attributes.create', 'attributes.edit']) }}">
                                    <span class="aiz-side-nav-text">Attribute</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('reviews.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Product Reviews</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('product_bulk_upload.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Bulk Import</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('product_bulk_export.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Bulk Export</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Auction Product -->
                @if (addon_is_activated('auction'))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-gavel aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Auction Products</span>
                            @if (env('DEMO_MODE') == 'On')
                                <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('auction_product_create.admin') }}">
                                    <span class="aiz-side-nav-text">Add New auction product</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('auction.all_products') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['auction_product_edit.admin', 'product_bids.admin']) }}">
                                    <span class="aiz-side-nav-text">All Auction Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('auction.inhouse_products') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Inhouse Auction Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('auction.seller_products') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Seller Auction Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('auction_products_orders') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['auction_products_orders.index']) }}">
                                    <span class="aiz-side-nav-text">Auction Products Orders</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Wholesale Product -->
                @if (addon_is_activated('wholesale'))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Wholesale Products</span>
                            @if (env('DEMO_MODE') == 'On')
                                <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('wholesale_product_create.admin') }}">
                                    <span class="aiz-side-nav-text">Add New Wholesale Product</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wholesale_products.all') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['wholesale_product_edit.admin']) }}">
                                    <span class="aiz-side-nav-text">All Wholesale Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wholesale_products.in_house') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['wholesale_product_edit.admin']) }}">
                                    <span class="aiz-side-nav-text">In House Wholesale Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wholesale_products.seller') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['wholesale_product_edit.admin']) }}">
                                    <span class="aiz-side-nav-text">Seller Wholesale Products</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Sale -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Sales</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        @if (Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('all_orders.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show']) }}">
                                    <span class="aiz-side-nav-text">All Orders</span>
                                </a>
                            </li>
                        @endif
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('enquiries.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['enquiries.index', 'enquiries.show']) }}">
                                <span class="aiz-side-nav-text">Product Enquiry</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Deliver Boy Addon-->
                @if (addon_is_activated('delivery_boy'))
                    @if (Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-truck aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Delivery Boy</span>
                                @if (env('DEMO_MODE') == 'On')
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boys.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">All Delivery Boy</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boys.create') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Add Delivery Boy</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boys-payment-histories') }}"
                                        class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payment Histories</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boys-collection-histories') }}"
                                        class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Collected Histories</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boy.cancel-request') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Cancel Request</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('delivery-boy-configuration') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Configuration</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

                <!-- Refund addon -->
                @if (addon_is_activated('refund_request'))
                    @if (Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-backward aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Refunds</span>
                                @if (env('DEMO_MODE') == 'On')
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('refund_requests_all') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['refund_requests_all', 'reason_show']) }}">
                                        <span class="aiz-side-nav-text">Refund Requests</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('paid_refund') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Approved Refunds</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('rejected_refund') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">rejected Refunds</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('refund_time_config') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Refund Configuration</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif


                <!-- Customers -->
                @if (Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Customers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Customer list</span>
                                </a>
                            </li>
                            @if (get_setting('classified_product') == 1)
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('classified_products') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Classified Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('customer_packages.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['customer_packages.index', 'customer_packages.create', 'customer_packages.edit']) }}">
                                        <span class="aiz-side-nav-text">Classified Packages</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Sellers -->
                {{-- @if ((Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) && get_setting('vendor_system_activation') == 1)
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Sellers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                @php
                                    $sellers = \App\Models\Seller::where('verification_status', 0)
                                        ->where('verification_info', '!=', null)
                                        ->count();
                                @endphp
                                <a href="{{ route('sellers.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history', 'sellers.approved', 'sellers.profile_modal', 'sellers.show_verification_request']) }}">
                                    <span class="aiz-side-nav-text">All Seller</span>
                                    @if ($sellers > 0)
                                        <span class="badge badge-info">{{ $sellers }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('sellers.payment_histories') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Payouts</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Payout Requests</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('business_settings.vendor_commission') }}"
                                    class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Seller Commission</span>
                                </a>
                            </li>

                            @if (addon_is_activated('seller_subscription'))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller_packages.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['seller_packages.index', 'seller_packages.create', 'seller_packages.edit']) }}">
                                        <span class="aiz-side-nav-text">Seller Packages</span>
                                        @if (env('DEMO_MODE') == 'On')
                                            <span class="badge badge-inline badge-danger">Addon</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('seller_verification_form.index') }}" class="aiz-side-nav-link">
                                    <span
                                        class="aiz-side-nav-text">Seller Verification Form</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif --}}
                @if (Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('uploaded-files.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create']) }}">
                            <i class="las la-folder-open aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Uploaded Files</span>
                        </a>
                    </li>
                @endif
                <!-- Reports -->
                @if (Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Reports</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('in_house_sale_report.index') }}"-->
                            <!--        class="aiz-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index']) }}">-->
                            <!--        <span class="aiz-side-nav-text">Product Sale</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            {{-- <li class="aiz-side-nav-item">
                                <a href="{{ route('seller_sale_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index']) }}">
                                    <span class="aiz-side-nav-text">Seller Products Sale</span>
                                </a>
                            </li> --}}
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('stock_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index']) }}">
                                    <span class="aiz-side-nav-text">Products Stock</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wish_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['wish_report.index']) }}">
                                    <span class="aiz-side-nav-text">Products wishlist</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('user_search_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index']) }}">
                                    <span class="aiz-side-nav-text">User Searches</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('abandoned-cart.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['abandoned-cart.index']) }}">
                                    <span class="aiz-side-nav-text">Abandoned Cart</span>
                                </a>
                            </li>
                            {{-- <li class="aiz-side-nav-item">
                                <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Commission History</span>
                                </a>
                            </li> --}}
                            {{-- <li class="aiz-side-nav-item">
                                <a href="{{ route('wallet-history.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Wallet Recharge History</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
                    <!--Blog System-->
                    <!--<li class="aiz-side-nav-item">-->
                    <!--    <a href="#" class="aiz-side-nav-link">-->
                    <!--        <i class="las la-bullhorn aiz-side-nav-icon"></i>-->
                    <!--        <span class="aiz-side-nav-text">Blog System</span>-->
                    <!--        <span class="aiz-side-nav-arrow"></span>-->
                    <!--    </a>-->
                    <!--    <ul class="aiz-side-nav-list level-2">-->
                    <!--        <li class="aiz-side-nav-item">-->
                    <!--            <a href="{{ route('blog.index') }}"-->
                    <!--                class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit']) }}">-->
                    <!--                <span class="aiz-side-nav-text">All Posts</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li class="aiz-side-nav-item">-->
                    <!--            <a href="{{ route('blog-category.index') }}"-->
                    <!--                class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit']) }}">-->
                    <!--                <span class="aiz-side-nav-text">Categories</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                @endif

                <!-- marketing -->
                @if (Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Marketing</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            {{-- @if (Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('flash_deals.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit']) }}">
                                        <span class="aiz-side-nav-text">Flash deals</span>
                                    </a>
                                </li>
                            @endif --}}
                            @if (Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('newsletters.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Newsletters</span>
                                    </a>
                                </li>
                                @if (addon_is_activated('otp_system'))
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('sms.index') }}" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Bulk SMS</span>
                                            @if (env('DEMO_MODE') == 'On')
                                                <span class="badge badge-inline badge-danger">Addon</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Subscribers</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('coupon.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index', 'coupon.create', 'coupon.edit']) }}">
                                    <span class="aiz-side-nav-text">Coupon</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Support -->
                {{-- @if (Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-link aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Support</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @if (Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                                @php
                                    $support_ticket = DB::table('tickets')
                                        ->where('viewed', 0)
                                        ->select('id')
                                        ->count();
                                @endphp
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('support_ticket.admin_index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show']) }}">
                                        <span class="aiz-side-nav-text">Ticket</span>
                                        @if ($support_ticket > 0)
                                            <span class="badge badge-info">{{ $support_ticket }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif

                            @php
                                $conversation = \App\Models\Conversation::where('receiver_id', Auth::user()->id)
                                    ->where('receiver_viewed', '1')
                                    ->get();
                            @endphp
                            @if (Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('conversations.admin_index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show']) }}">
                                        <span class="aiz-side-nav-text">Product Queries</span>
                                        @if (count($conversation) > 0)
                                            <span class="badge badge-info">{{ count($conversation) }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif --}}

            

       

                <!-- Website Setup -->
                @if (Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#"
                            class="aiz-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header', 'banners.*']) }}">
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Website Setup</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Header</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.menu') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Menus</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.footer', ['lang' => App::getLocale()]) }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['website.footer']) }}">
                                    <span class="aiz-side-nav-text">Footer</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.pages') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create', 'custom-pages.edit']) }}">
                                    <span class="aiz-side-nav-text">Pages</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Appearance</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('home-slider.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['home-slider.index', 'home-slider.create', 'home-slider.edit']) }}">
                                    <span class="aiz-side-nav-text">Home Page Sliders</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('banners.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['banners.index', 'banners.create', 'banners.edit']) }}">
                                    <span class="aiz-side-nav-text">Banners</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Setup & Configurations -->
                @if (Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Setup & Configurations</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('general_setting.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">General Settings</span>
                                </a>
                            </li>

                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('activation.index') }}" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">Features activation</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('languages.index') }}"-->
                            <!--        class="aiz-side-nav-link {{ areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit']) }}">-->
                            <!--        <span class="aiz-side-nav-text">Languages</span>-->
                            <!--    </a>-->
                            <!--</li>-->

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('currency.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Currency</span>
                                </a>
                            </li>
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('tax.index') }}"-->
                            <!--        class="aiz-side-nav-link {{ areActiveRoutes(['tax.index', 'tax.create', 'tax.store', 'tax.show', 'tax.edit']) }}">-->
                            <!--        <span class="aiz-side-nav-text">Vat & TAX</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('pick_up_points.index') }}"-->
                            <!--        class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_points.index', 'pick_up_points.create', 'pick_up_points.edit']) }}">-->
                            <!--        <span class="aiz-side-nav-text">Pickup point</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">SMTP Settings</span>
                                </a>
                            </li>
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('payment_method.index') }}" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">Payment Methods</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('file_system.index') }}" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">File System & Cache Configuration</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="{{ route('social_login.index') }}" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">Social media Logins</span>-->
                            <!--    </a>-->
                            <!--</li>-->

                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="javascript:void(0);" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">Facebook</span>-->
                            <!--        <span class="aiz-side-nav-arrow"></span>-->
                            <!--    </a>-->
                            <!--    <ul class="aiz-side-nav-list level-3">-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('facebook_chat.index') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Facebook Chat</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('facebook-comment') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Facebook Comment</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->

                            <!--<li class="aiz-side-nav-item">-->
                            <!--    <a href="javascript:void(0);" class="aiz-side-nav-link">-->
                            <!--        <span class="aiz-side-nav-text">Google</span>-->
                            <!--        <span class="aiz-side-nav-arrow"></span>-->
                            <!--    </a>-->
                            <!--    <ul class="aiz-side-nav-list level-3">-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('google_analytics.index') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Analytics Tools</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('google_recaptcha.index') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Google reCAPTCHA</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('google-map.index') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Google Map</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li class="aiz-side-nav-item">-->
                            <!--            <a href="{{ route('google-firebase.index') }}" class="aiz-side-nav-link">-->
                            <!--                <span class="aiz-side-nav-text">Google Firebase</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->




                            <li class="aiz-side-nav-item">
                                <a href="javascript:void(0);" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Shipping</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <ul class="aiz-side-nav-list level-3">
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('shipping_configuration.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index', 'shipping_configuration.edit', 'shipping_configuration.update']) }}">
                                            <span class="aiz-side-nav-text">Shipping Configuration</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('countries.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['countries.index', 'countries.edit', 'countries.update']) }}">
                                            <span class="aiz-side-nav-text">Shipping Countries</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('states.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['states.index', 'states.edit', 'states.update']) }}">
                                            <span class="aiz-side-nav-text">Shipping States</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('cities.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['cities.index', 'cities.edit', 'cities.update']) }}">
                                            <span class="aiz-side-nav-text">Shipping Cities</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif


                <!-- Staffs -->
                @if (Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Staffs</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('staffs.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit']) }}">
                                    <span class="aiz-side-nav-text">All staffs</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit']) }}">
                                    <span class="aiz-side-nav-text">Staff permissions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
                    <!--<li class="aiz-side-nav-item">-->
                    <!--    <a href="#" class="aiz-side-nav-link">-->
                    <!--        <i class="las la-user-tie aiz-side-nav-icon"></i>-->
                    <!--        <span class="aiz-side-nav-text">System</span>-->
                    <!--        <span class="aiz-side-nav-arrow"></span>-->
                    <!--    </a>-->
                    <!--    <ul class="aiz-side-nav-list level-2">-->
                    <!--        <li class="aiz-side-nav-item">-->
                    <!--            <a href="{{ route('system_update') }}" class="aiz-side-nav-link">-->
                    <!--                <span class="aiz-side-nav-text">Update</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li class="aiz-side-nav-item">-->
                    <!--            <a href="{{ route('system_server') }}" class="aiz-side-nav-link">-->
                    <!--                <span class="aiz-side-nav-text">Server status</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                @endif

                <!-- Addon Manager -->
                @if (Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
                    <!--<li class="aiz-side-nav-item">-->
                    <!--    <a href="{{ route('addons.index') }}"-->
                    <!--        class="aiz-side-nav-link {{ areActiveRoutes(['addons.index', 'addons.create']) }}">-->
                    <!--        <i class="las la-wrench aiz-side-nav-icon"></i>-->
                    <!--        <span class="aiz-side-nav-text">Addon Manager</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                @endif
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
