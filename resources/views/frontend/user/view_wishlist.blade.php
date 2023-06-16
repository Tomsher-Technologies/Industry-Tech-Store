@extends('frontend.layouts.app')

@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">My Account</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            @if ($wishlists->count())
                                <table aria-describedby="wishlist"
                                    class="table ps-table--shopping-cart ps-table--responsive">
                                    <thead class="ps-table--shopping-cart-header">
                                        <tr>
                                            <th>Products</th>
                                            <th>PRICE</th>
                                            <th>ACTION</th>
                                            <th>REMOVE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlists as $key => $wishlist)
                                            <tr data-loop-container={{ $key }}>
                                                <td data-label="Product">
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail">
                                                            <a href="{{ route('product', $wishlist->product->slug) }}">
                                                                <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}"
                                                                    alt="{{ $wishlist->product->name }}"
                                                                    onerror="this.onerror=null;this.src='{{ frontendAsset('img/placeholder.webp') }}';" />
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__content">
                                                            <a href="{{ route('product', $wishlist->product->slug) }}">
                                                                {{ $wishlist->product->name }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price text-center" data-label="Price">
                                                    {{ home_discounted_base_price($wishlist->product) }}
                                                    @if (home_base_price($wishlist->product) != home_discounted_base_price($wishlist->product))
                                                        <del>{{ home_base_price($wishlist->product) }}</del>
                                                    @endif
                                                </td>
                                                <td class="text-center" data-label="actions-add">
                                                    <a class="ps-btn" href="checkout.html">Add to cart</a>
                                                </td>
                                                <td class="text-center" data-label="Actions">
                                                    <button data-loop-id={{ $key }}
                                                        data-list-id={{ $wishlist->id }} class="wishlistRemove"><i
                                                            class="icon-cross"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $wishlists->links('vendor.pagination.product_listing') }}
                            @else
                                You dont have any items in your wishlist
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <style>
        .wishlistRemove {
            all: unset;
            font-size: 20px;
        }

        .wishlistRemove:hover {
            color: #eb6228;
        }
    </style>
@endsection
@section('script')
    <script>
        $('.wishlistRemove').on('click', function() {
            loop_id = $(this).data('loop-id');
            list_id = $(this).data('list-id');
            $(this).attr('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('wishlists.remove') }}",
                data: {
                    'id': list_id,
                    '_token': "{{ csrf_token() }}"
                },
                success: function(data) {
                    var rdata = JSON.parse(data);
                    if (rdata.status == 200) {
                        $('[data-loop-container="' + loop_id + '"]').remove();
                        if ($('.ps-table--shopping-cart tbody tr').length <= 0) {
                            $('.table-responsive').html(
                                "<p>You dont have any items in your wishlist</p>");
                        }
                        $('.headerWishlistCount').html(rdata.count)
                    } else {
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        location.reload();
                    }
                },
            });
        });
    </script>
@endsection
