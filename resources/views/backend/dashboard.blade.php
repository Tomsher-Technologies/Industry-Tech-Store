@extends('backend.layouts.app')

@section('content')
    @if (env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null)
        <div class="">
            <div class="alert alert-danger d-flex align-items-center">
                {{ translate('Please Configure SMTP Setting to work all email sending functionality') }},
                <a class="alert-link ml-2" href="{{ route('smtp_settings.index') }}">{{ translate('Configure Now') }}</a>
            </div>
        </div>
    @endif
    @if (Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
        <div class="row gutters-10">
            <div class="col-lg-12 text-right">
                <a href="{{ route('cache.clear', ['type' => 'counts']) }}"
                    class="btn btn-sm btn-soft-secondary btn-circle mr-2 mb-2">
                    <i class="la la-refresh fs-24"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="row gutters-10">
                    <div class="col-3">
                        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Customer') }}
                                </div>
                                <div class="h3 fw-700 mb-3">
                                    {{ $counts['totalUsersCount'] }}
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class="d-block">{{ translate('Total') }}</span>
                                    {{ translate('Products') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['totalProductsCount'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Product category') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['categoryCount'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Product brand') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['brandCount'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row gutters-10">
                    <div class="col-3">
                        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Sales Amount') }}
                                </div>
                                <div class="h3 fw-700 mb-3">
                                    {{ $counts['salesAmount'] }}
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class="d-block">{{ translate('Total') }}</span>
                                    {{ translate('Orders') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['orderCount'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Completed Orders') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['orderCompletedCount'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
                            <div class="px-3 pt-3">
                                <div class="fs-20">
                                    <span class=" d-block">{{ translate('Total') }}</span>
                                    {{ translate('Products Sold') }}
                                </div>
                                <div class="h3 fw-700 mb-3">{{ $counts['productsSold'] }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
        <div class="row gutters-10">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">{{ translate('Orders This Month') }}</h6>
                        <a href="{{ route('cache.clear', ['type' => 'orderMonthGraph']) }}"
                            class="btn btn-sm btn-soft-secondary btn-circle mr-2">
                            <i class="la la-refresh fs-24"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <canvas id="graph-1" class="w-100" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">{{ translate('Orders Past 12 Months') }}</h6>

                        <a href="{{ route('cache.clear', ['type' => 'orderMonthGraph']) }}"
                            class="btn btn-sm btn-soft-secondary btn-circle mr-2">
                            <i class="la la-refresh fs-24"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <canvas id="graph-2" class="w-100" height="500"></canvas>
                    </div>
                </div>
            </div>

        </div>
    @endif


    <div class="card">
        <div class="card-header row gutters-5">
            <div class="col">
                <h6 class="mb-0">{{ translate('Latest User Searches') }}</h6>
            </div>

            <a href="{{ route('cache.clear', ['type' => 'searches']) }}"
                class="btn btn-sm btn-soft-secondary btn-circle mr-2">
                <i class="la la-refresh fs-24"></i>
            </a>

            <a href="{{ route('user_search_report.index') }}" class="btn btn-primary">View All</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ translate('Search Key') }}</th>
                        <th>{{ translate('User') }}</th>
                        <th>{{ translate('IP Address') }}</th>
                        <th>{{ translate('Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($searches as $key => $searche)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $searche->query }}</td>
                            <td>
                                @if ($searche->user_id)
                                    <a href="{{ route('user_search_report.index', ['user_id' => $searche->user_id]) }}">
                                        {{ $searche->user->name }}
                                    </a>
                                @else
                                    GUEST
                                @endif
                            </td>
                            <td>{{ $searche->ip_address }}</td>
                            <td>{{ $searche->created_at->format('d-m-Y h:i:s A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">{{ translate('Top Selling Products') }}</h6>

            <a href="{{ route('cache.clear', ['type' => 'topProducts']) }}"
                class="btn btn-sm btn-soft-secondary btn-circle mr-2">
                <i class="la la-refresh fs-24"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"
                data-md-items="3" data-sm-items="2" data-arrows='true'>
                @foreach ($topProducts as $key => $product)
                    <div class="carousel-box">
                        <div
                            class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                            <div class="position-relative">
                                <a href="{{ route('product', $product->slug) }}" class="d-block">
                                    <img class="img-fit lazyload mx-auto h-210px"
                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                        alt="{{ $product->name }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                </a>
                            </div>
                            <div class="p-md-3 p-2 text-left">
                                <div class="fs-15">
                                    @if (home_base_price($product) != home_discounted_base_price($product))
                                        <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product) }}</del>
                                    @endif
                                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                                </div>
                                <h3 class="fw-600 fs-14 text-truncate-2 lh-1-4 mb-0">
                                    <a href="{{ route('product', $product->slug) }}"
                                        class="d-block text-reset">{{ $product->name }}</a>
                                </h3>
                                <div class="fs-13">
                                    Total sales: {{ $product->order_details_sum_quantity }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        AIZ.plugins.chart('#graph-1', {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($days as $day)
                        '{{ $day }}',
                    @endforeach
                ],
                datasets: [{
                    label: '{{ translate('No:of orders recived this month') }}',
                    data: [
                        {{ $orderMonthGraph['monthOrdersData'] }}
                    ],
                    backgroundColor: [
                        @foreach ($days as $key => $day)
                            'rgba(55, 125, 255, 0.4)',
                        @endforeach
                    ],
                    borderColor: [
                        @foreach ($days as $key => $day)
                            'rgba(55, 125, 255, 1)',
                        @endforeach
                    ],
                    borderWidth: 1
                }, {
                    label: '{{ translate('No:of orders completed this month') }}',
                    data: [
                        {{ $orderMonthGraph['monthOrdersCompletedData'] }}
                    ],
                    backgroundColor: [
                        @foreach ($days as $key => $day)
                            'rgba(43, 255, 112, 0.4)',
                        @endforeach
                    ],
                    borderColor: [
                        @foreach ($days as $key => $day)
                            'rgba(43, 255, 112, 1)',
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: '#f2f3f8',
                            zeroLineColor: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10,
                            beginAtZero: true,
                            precision: 0
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontFamily: 'Poppins',
                        boxWidth: 10,
                        usePointStyle: true
                    }
                }
            }
        });


        AIZ.plugins.chart('#graph-2', {
            type: 'bar',
            data: {
                labels: {!! $orderYearGraph['all']['months'] !!},
                datasets: [{
                    label: '{{ translate('No:of orders recived') }}',
                    data: {{ $orderYearGraph['all']['counts'] }},
                    backgroundColor: [
                        @for ($i = 0; $i < 12; $i++)
                            'rgba(55, 125, 255, 0.4)',
                        @endfor
                    ],
                    borderColor: [
                        @for ($i = 0; $i < 12; $i++)
                            'rgba(55, 125, 255, 1)',
                        @endfor
                    ],
                    borderWidth: 1
                }, {
                    label: '{{ translate('No:of orders completed') }}',
                    data: {{ $orderYearGraph['completed']['counts'] }},
                    backgroundColor: [
                        @for ($i = 0; $i < 12; $i++)
                            'rgba(43, 255, 112, 0.4)',
                        @endfor
                    ],
                    borderColor: [
                        @for ($i = 0; $i < 12; $i++)
                            'rgba(43, 255, 112, 1)',
                        @endfor
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: '#f2f3f8',
                            zeroLineColor: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10,
                            beginAtZero: true,
                            precision: 0
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontFamily: 'Poppins',
                        boxWidth: 10,
                        usePointStyle: true
                    }
                }
            }
        });
    </script>
@endsection
