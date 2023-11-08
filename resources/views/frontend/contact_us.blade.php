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

    <div class="">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14432.208312987732!2d55.25717008891182!3d25.268833496412803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4384740a5241%3A0xe6d78cfd14c6ada3!2sDubai%20Maritime%20City%20-%20Dubai!5e0!3m2!1sen!2sae!4v1699002810327!5m2!1sen!2sae"
            width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="ps-contact-info">
        <div class="container">
            <div class="ps-section__header">
                <h3>Contact Us For Any Questions</h3>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="ps-block--contact-info">
                            <h4>Head Quater</h4>
                            <p>
                                Warehouse 130B, Dubai Maritime City, Dubai, United Arab
                                Emirates, P.O. Box 119218
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="ps-block--contact-info">
                            <h4>Phone</h4>
                            <p>
                                <span>Mobile :</span>
                                <a href="tel:+971507924960">+971 507924960 ,</a>
                            </p>
                            <p>
                                <span></span> <a href="tel:+97143638100">+971 4 3638100</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="ps-block--contact-info">
                            <h4>Email</h4>
                            <p>
                                <a href="mailto:info@industrytechstore.com">info@industrytechstore.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="ps-block--contact-info">
                            <h4>Branch Office</h4>
                            <p>
                                Voyage Marine Automation LLC Al Jurf, Ajman. P.O. Box: 20070
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__content">
                <section class="section">
                    <div class="container">
                        <div class="card">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card-body p-4 p-md-5">
                                        <h2 class="text-center mb-4 fs-10">{{ $page->title }}</h2>
                                    </div>
                                </div>

                                <div class="col-lg-6 px-4">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14432.208312987732!2d55.25717008891182!3d25.268833496412803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4384740a5241%3A0xe6d78cfd14c6ada3!2sDubai%20Maritime%20City%20-%20Dubai!5e0!3m2!1sen!2sae!4v1699002810327!5m2!1sen!2sae"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="col-lg-6 px-4">
                                    <h3>CONTACT INFO</h3>
                                    <hr>
                                    <h4>Address:</h4>
                                    <p>
                                        <b>(Head Office)</b> Warehouse 130B, <br> Dubai Maritime City, <br>Dubai, United
                                        Arab
                                        Emirates, <br>P.O. Box 119218
                                    </p>
                                    <p>
                                       <b>(Branch Office)</b> Voyage Marine Automation LLC<br>
                                        Al Jurf, Ajman. <br> P.O. Box: 20070
                                    </p>
                                    <hr>
                                    <h4>Phone:</h4>
                                    <p>
                                        Mobile : <a href="tel:+971507924960">+971 507924960</a>, <a href="tel:+97143638100">
                                            +971 4 3638100</a>
                                    </p>
                                    <hr>
                                    <h4>Email:</h4>
                                    <p>
                                        <a href="mailto:info@industrytechstore.com">info@industrytechstore.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <style>
        .card:hover {
            box-shadow: none;
            border-color: rgba(0, 0, 0, 0.175);
        }
    </style> --}}
@endsection
