<div class="ps-newsletter">
    <div class="ps-container">
        <div class="ps-form--newsletter">
            <div class="row">

                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__left">
                        <h3>CONNECT</h3>
                        @if (get_setting('show_social_links'))
                            <ul class="ps-list--social">
                                @if (get_setting('facebook_link') != null)
                                    <li>
                                        <a class="facebook" href="{{ get_setting('facebook_link') }}" target="_blank">
                                            <img src="{{ frontendAsset('img/icons/Facebook.png') }}" alt="Facebook">
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('instagram_link') != null)
                                    <li>
                                        <a class="twitter" href="{{ get_setting('instagram_link') }}" target="_blank">
                                            <img src="{{ frontendAsset('img/icons/instagram.png') }}" alt="Instagram">
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('whatsapp_link') != null)
                                    <li>
                                        <a class="google-plus" href="{{ get_setting('whatsapp_link') }}"
                                            target="_blank">
                                            <img src="{{ frontendAsset('img/icons/whatsapp.png') }}" alt="Whatsapp">
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('twitter_link') != null)
                                    <li>
                                        <a class="instagram" href="{{ get_setting('twitter_link') }}" target="_blank">
                                            <img src="{{ frontendAsset('img/icons/twitter.png') }}" alt="Twitter">
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('youtube_link') != null)
                                    <li>
                                        <a class="instagram" href="{{ get_setting('youtube_link') }}" target="_blank">
                                            <img src="{{ frontendAsset('img/icons/youtube.png') }}" alt="Youtube">
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__left">
                        <h3>EMAIL SUPPORT</h3>
                        <p>{{ get_setting('contact_email') }}</p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__left">
                        <h3>HELP CENTER</h3>
                        <p>{{ get_setting('contact_phone') }}</p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__right">
                        <h3>NEWS LETTER</h3>
                        <form id="newsletter" method="POST">
                            <div class="form-group--nest">
                                <input name="email" class="form-control" type="email" placeholder="Email address">
                                <button type="submit" class="ps-btn">Subscribe</button>
                            </div>
                            <div class="newsletter_notice p-3 mt-3 rounded" style="display: none">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="ps-footer">
    <div class="ps-container">
        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href=""> About us</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="">Resources</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">Feedback</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Quick links</h4>
                <ul class="ps-list--link">
                    <li><a href="">My Account </a></li>
                    <li><a href="">Login </a></li>
                    <li><a href="">Register </a></li>
                    <li><a href="">Cart </a></li>
                    <li><a href="">Check out </a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Help</h4>
                <ul class="ps-list--link">
                    <li><a href="">Payments</a></li>
                    <li><a href="">Shipping</a></li>
                    <li><a href="">Request for Quotation</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Report Infringement </a></li>

                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Terms</h4>
                <ul class="ps-list--link">
                    <li><a href="">Terms of Use</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Consumer Rights</a></li>
                    <li><a href="">Cancellation & Returns</a></li>

                </ul>
            </aside>
        </div>

        <div class="ps-footer__copyright">
            <p>{!! get_setting('frontend_copyright_text', '&copy; 2023 ITS All Rights Reserved | WEBSITE BY TOMSHER', false) !!} </p>
            <p>
                <img alt="Our payment gateways" src="{{ frontendAsset('img/payment-method/1.jpg') }}" height="30"
                    class="mw-100 h-auto" style="max-height: 30px">
            </p>
        </div>
    </div>
</footer>
<div id="back2top"><i class="icon icon-arrow-up"></i></div>
