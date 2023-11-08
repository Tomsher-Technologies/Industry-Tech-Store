@extends('frontend.layouts.app')

@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>{{ $page->title }}</li>
            </ul>
        </div>
    </div>


    <div class="ps-page--single" id="about-us">
        <img src="{{ frontendAsset('img/about.jpg') }}" alt="" />
        <div class="ps-about-intro pt-50 pb-20">
            <div class="container">
                <div class="ps-section__header">
                    <h4>Who We Are</h4>
                    <h3>
                        Voyage Marine Automation LLC is recognized as one of the leading
                        solution providers in Marine and Oil & Gas industry. Established
                        in the year 2002, in the United Arab Emirates, the company was
                        founded by a group of professionals with incredible passion for
                        the Marine industry.
                    </h3>
                </div>
            </div>
        </div>

        <div class="ps-section--vendor ps-vendor-best-fees" style="background-color: #fff">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Our Vision</h4>
                        </div>
                        <div class="ps-section__content">
                            <p>
                                We aim to be a global pioneer solution provider in Marine and
                                Oil & Gas industry.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Our mission</h4>
                        </div>

                        <div class="ps-section__desc">
                            <figure>
                                <ul>
                                    <li>To provide quality service and reliability.</li>
                                    <li>
                                        To exceed the customers expectation through successful
                                        project delivery before schedule.
                                    </li>
                                    <li>To reflect integrity and ethics in our actions.</li>
                                    <li>
                                        To be dynamic and innovative to strive for excellence.
                                    </li>
                                    <li>
                                        To promote career growth and personal development of our
                                        employees.
                                    </li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Our Core Values</h4>
                        </div>

                        <div class="ps-section__desc">
                            <figure>
                                <ul>
                                    <li><b>C</b>ommitment</li>
                                    <li><b>P</b>assion</li>
                                    <li><b>R</b>espect</li>
                                    <li><b>I</b>ntegrity</li>
                                    <li><b>T</b>eamwork</li>
                                    <li><b>H</b>onesty</li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Our Services</h4>
                        </div>
                        <div class="ps-section__desc">
                            <figure>
                                <ul>
                                    <li>
                                        Repair & Retrofit
                                        <div class="ps-section__desc">
                                            <figure>
                                                <ul>
                                                    <li>Electrical & Instrumentation</li>
                                                    <li>Automation & Control</li>
                                                    <li>Life Saving Appliances (LSA)</li>
                                                    <li>Fire Fighting Appliances (FFA)</li>
                                                </ul>
                                            </figure>
                                        </div>
                                    </li>
                                    <li>Navigation & Communication</li>
                                    <li>Inspection, Testing & Certification</li>
                                    <li>Turnkey Projects</li>
                                    <li>Rental</li>
                                    <li>Calibration</li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Our Products</h4>
                        </div>
                        <div class="ps-section__desc">
                            <figure>
                                <ul>
                                    <li>Gas Detection Systems</li>
                                    <li>Fire Alarm Systems</li>
                                    <li>Electrical Systems</li>
                                    <li>Automation & Control Systems</li>
                                    <li>Life Saving Appliances</li>
                                    <li>Fire Fighting Appliances</li>
                                    <li>Navigation & Communication Systems</li>
                                    <li>Featured Marine Products & Systems</li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ps-section__header">
                            <h4>Sectors we Serve</h4>
                        </div>
                        <div class="ps-section__desc">
                            <figure>
                                <ul>
                                    <li>
                                        Marine, Oil & Gas
                                        <ul>
                                            <li>Drydock</li>
                                            <li>Afloat</li>
                                            <li>Offshore/Anchorage</li>
                                            <li>Running Squad</li>
                                            <li>In-house services</li>
                                            <li>Online services</li>
                                        </ul>
                                    </li>

                                    <li>
                                        Industrial Service
                                        <ul>
                                            <li>Power & Energy</li>
                                            <li>Petrochemical Industries</li>
                                        </ul>
                                    </li>
                                </ul>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="ps-vendor-banner bg--cover" data-background="img/about.jpg">
        <div class="container">
            <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h2>
        </div>
    </div> --}}


    <!-- <div class="ps-page--single" id="about-us"><img src="img/about.jpg" alt=""> -->
    {{-- <div class="ps-about-intro pt-50 pb-20">
        <div class="container">
            <div class="ps-section__header">
                <h4>Who We Are</h4>
                <h3>Voyage Marine Automation LLC is recognized as one of the leading solution providers in Marine and Oil &
                    Gas industry. Established in the year 2002, in the United Arab Emirates, the company was founded by a
                    group of professionals with incredible passion for the Marine industry.</h3>
            </div>
        </div>
    </div> --}}

    {{-- <div class="ps-section--vendor ps-vendor-best-fees">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Our Vision</h4>
                    </div>
                    <div class="ps-section__content">
                        <p>
                            We aim to be a global pioneer solution provider in Marine and Oil & Gas industry.
                        </p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Our mission</h4>
                    </div>
                    <div class="ps-section__content">
                        <ul>
                            <li>
                                To provide quality service and reliability.
                            </li>
                            <li>
                                To exceed the customers expectation through successful project delivery before schedule.
                            </li>
                            <li>
                                To reflect integrity and ethics in our actions.
                            </li>
                            <li>
                                To be dynamic and innovative to strive for excellence.
                            </li>
                            <li>
                                To promote career growth and personal development of our employees.
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Our Core Values</h4>
                    </div>
                    <div class="ps-section__content">
                        <ul>
                            <li><b>C</b>ommitment</li>
                            <li><b>P</b>assion</li>
                            <li><b>R</b>espect</li>
                            <li><b>I</b>ntegrity</li>
                            <li><b>T</b>eamwork</li>
                            <li><b>H</b>onesty</li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Our Services</h4>
                    </div>
                    <div class="ps-section__content">
                        <ul>
                            <li>
                                Repair & Retrofit
                                <ul>
                                    <li>Electrical & Instrumentation</li>
                                    <li>
                                        Automation & Control
                                    </li>
                                    <li>
                                        Life Saving Appliances (LSA)
                                    </li>
                                    <li>
                                        Fire Fighting Appliances (FFA)
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Navigation & Communication
                            </li>
                            <li>
                                Inspection, Testing & Certification
                            </li>
                            <li>
                                Turnkey Projects
                            </li>
                            <li>
                                Rental
                            </li>
                            <li>
                                Calibration
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Our Products</h4>
                    </div>
                    <div class="ps-section__content">
                        <ul>
                            <li>Gas Detection Systems</li>
                            <li>Fire Alarm Systems</li>
                            <li>Electrical Systems</li>
                            <li>Automation & Control Systems</li>
                            <li>Life Saving Appliances</li>
                            <li>Fire Fighting Appliances</li>
                            <li>Navigation & Communication Systems</li>
                            <li>Featured Marine Products & Systems</li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="ps-section__header">
                        <h4>Sectors we Serve</h4>
                    </div>
                    <div class="ps-section__content">
                        <ul>
                            <li>
                                Marine, Oil & Gas
                                <ul>
                                    <li>Drydock</li>
                                    <li>Afloat</li>
                                    <li>Offshore/Anchorage</li>
                                    <li>Running Squad</li>
                                    <li>In-house services</li>
                                    <li>Online services</li>
                                </ul>
                            </li>

                            <li>
                                Industrial Service
                                <ul>
                                    <li>Power & Energy</li>
                                    <li>Petrochemical Industries</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('header')
<style>
    .ps-vendor-best-fees .ps-section__content {
      max-width: 100%;
      margin: 0 auto;
      text-align: left;
    }

    .ps-section--vendor .ps-section__header {
      text-align: left;
      padding-bottom: 10px;
    }

    .ps-section--vendor {
      padding: 50px 0;
    }

    .ps-about-intro .ps-section__header h4 {
      margin-bottom: 30px;
      font-size: 24px;
      color: #000;
      font-weight: 600;
    }

    .ps-about-intro .ps-section__header {
      max-width: 820px;
      margin: 0 auto 50px;
    }
  </style>
@endsection
