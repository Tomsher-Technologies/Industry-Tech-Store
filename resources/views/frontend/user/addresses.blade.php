@extends('frontend.layouts.app')

@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">My Account</a></li>
                <li>Addresses</li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__content">
                <div class="row">
                    @include('frontend.partials.dashboard.sidebar')
                    <div class="col-xxl-8 col-lg-8">
                        <div class="dashboard-right-sidebar">
                            <div class="tab-content">
                                <div class="total-box">
                                    <div class="row g-sm-4 g-3">
                                        @if ($addresses)
                                            @foreach ($addresses as $address)
                                                <div class="col-lg-6">
                                                    <div class="border p-3 pr-5 rounded mb-3 position-relative">
                                                        <div>
                                                            <span class="w-50 fw-600">Name:</span>
                                                            <span class="ml-2">{{ $address->name }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">Address:</span>
                                                            <span class="ml-2">{{ $address->address }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">Postal code:</span>
                                                            <span class="ml-2">{{ $address->postal_code }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">City:</span>
                                                            <span class="ml-2">{{ $address->city }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">State:</span>
                                                            <span class="ml-2">{{ $address->state->name }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">Country:</span>
                                                            <span class="ml-2">{{ $address->country->name }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="w-50 fw-600">Phone:</span>
                                                            <span class="ml-2">{{ $address->phone }}</span>
                                                        </div>
                                                        @if ($address->set_default)
                                                            <div class="position-absolute end-0 bottom-0 pe-2 pb-3">
                                                                <span class="badge badge-soft-success">Default</span>
                                                            </div>
                                                        @endif
                                                        <div class="dropdown position-absolute end-0 top-0 pe-2 pb-3">

                                                            <button class="btn bg-gray px-2" style="font-size: 22px"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="iconly-Arrow-Down-Circle icli"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"
                                                                    onclick="edit_address({{ $address->id }})">
                                                                    Edit
                                                                </a>
                                                                @if (!$address->set_default)
                                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                                        onclick="makeDefault('{{ $address->id }}')">Make
                                                                        This Default</a>
                                                                @endif
                                                                <a class="dropdown-item"
                                                                    href="{{ route('addresses.destroy', $address->id) }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        <div class="col-lg-6 mx-auto curser" id="addAddressContaniner"
                                            style="cursor: pointer" onclick="add_new_address()">
                                            <div
                                                class="border p-3 rounded mb-3 h-100 c-pointer text-center bg-light d-flex flex-column align-items-center justify-content-center">
                                                <i class="iconly-Plus icli" style="font-size: 45px"></i>
                                                <div class="alpha-7">Add New Address</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="new-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                    <button type="button" class="ps-btn--close  close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-default" role="form" id="addressAddForm">
                    <div class="modal-body">
                        <div class="p-3">
                            <div class=" row">
                                <label class="col-md-2">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="us3-address" />
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div id="us3" style="height: 400px;"></div>
                                </div>
                            </div>

                            <input type="hidden" name="latitude" class="form-control" id="us3-lat" />
                            <input type="hidden" name="longitude" class="form-control" id="us3-lon" />

                            <div class="row mt-3">
                                <div class="col-md-2">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="Your Name" name="name"
                                        value="{{ auth()->user() ? auth()->user()->name : '' }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control mb-3" placeholder="Your Address" rows="2" name="address" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control aiz-selectpicker" data-live-search="true"
                                            data-placeholder="Select your country" name="country_id" required>
                                            <option value="">Select your country</option>
                                            @if ($country)
                                                @foreach ($country as $key => $coun)
                                                    <option value="{{ $coun->id }}">{{ $coun->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label>State</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control mb-3 aiz-selectpicker" data-live-search="true"
                                        name="state_id" required>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label>City</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="Your City"
                                        name="city" required>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label>Postal code</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 numbers-only"
                                        placeholder="Your Postal Code" name="postal_code" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 numbers-only" placeholder="+971"
                                        name="phone" value="" required>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" id="addressAddFormSubmit"
                                    class="ps-btn ps-btn--fullwidth">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit_modal_body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('header')
    <style>
        .pac-container {
            z-index: 9999;
        }

        @media(min-width:991px) {
            .modal-dialog {
                max-width: 40%;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        $('#addressAddForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('addresses.store') }}",
                data: $('#addressAddForm').serialize(),
                type: 'POST',
                success: function(response) {
                    if (response.msg && response.msg == 'success') {
                        $(response.data).insertBefore("#addAddressContaniner");
                        $('#addressAddForm').get(0).reset()
                        $('#new-address-modal').modal('hide');
                    } else {
                        launchToast('Somting went wrong, please try again', 'error');
                    }
                }
            });
        });

        $(document).on("keydown", "form", function(event) {
            return event.key != "Enter";
        });

        function makeDefault(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('addresses.set_default') }}",
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}"
                },
                success: function(data, status, xhr) {
                    if (xhr.status == 200) {
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        location.reload();
                    }
                    if (xhr.status == 401) {
                        launchToast("Please try again", 'error');
                    }
                },
            });

        }

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

    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&v=weekly"></script>
    <script src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
    <script>
        function showPosition(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            loadMap(lat, lng)
        }

        function showPositionerror() {
            loadMap(25.2048, 55.2708)
        }

        function loadMap(lat, lng) {
            $('#us3').locationpicker({
                location: {
                    latitude: lat,
                    longitude: lng
                },
                radius: 0,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function(currentLocation, radius, isMarkerDropped) {
                    // Uncomment line below to show alert on each Location Changed event
                    //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                }
            });
        }

        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition, showPositionerror);
            } else {
                loadMap(25.2048, 55.2708)
            }
        });
    </script>


    <script type="text/javascript">
        function add_new_address() {
            $('#new-address-modal').modal('show');
        }

        function edit_address(address) {
            var url = '{{ route('addresses.edit', ':id') }}';
            url = url.replace(':id', address);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#edit_modal_body').html(response.html);
                    $('#edit-address-modal').modal('show');


                    @if (get_setting('google_map') == 1)
                        var lat = -33.8688;
                        var long = 151.2195;

                        if (response.data.address_data.latitude && response.data.address_data.longitude) {
                            lat = response.data.address_data.latitude;
                            long = response.data.address_data.longitude;
                        }

                        initialize(lat, long, 'edit_');
                    @endif
                }
            });
        }

        $(document).on('change', '[name=country_id]', function() {
            var country_id = $(this).val();
            get_states(country_id);
        });

        $(document).on('change', '[name=state_id]', function() {
            var state_id = $(this).val();
        });

        function get_states(country_id) {
            $('[name="state"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get-state') }}",
                type: 'POST',
                data: {
                    country_id: country_id
                },
                success: function(response) {
                    var obj = JSON.parse(response);
                    if (obj != '') {
                        $('[name="state_id"]').html(obj);
                    }
                }
            });
        }
    </script>
@endsection
