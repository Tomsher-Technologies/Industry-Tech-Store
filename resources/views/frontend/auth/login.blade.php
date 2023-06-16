@extends('frontend.layouts.app')
@section('content')
    <div class="ps-page--my-account">
        <div class="ps-my-account"
            style="
        background-image: url({{ frontendAsset('img/banner/login-01.webp') }});
        background-size: cover;
        background-repeat: no-repeat;
      ">
            <div class="container">
                <div class="ps-form--account ps-tab-root">
                    <ul class="ps-tab-list">
                        <li class="{{ request()->get('register') == 0 ? 'active' : '' }}"><a class="tab-switch-login"
                                href="#sign-in">Login</a></li>
                        <li class="{{ request()->get('register') == 1 ? 'active' : '' }}"><a class="tab-switch-register"
                                href="#register">Register</a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab {{ request()->get('register') == 0 ? 'active' : '' }}" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Log In Your Account</h5>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf

                                    @error('login')
                                        <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email"
                                            placeholder="Email address" value="{{ old('email') }}" required />
                                        @error('email')
                                            <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-forgot">
                                        <input class="form-control" type="password" name="password" placeholder="Password"
                                            required />
                                        <a href="{{ route('password.request') }}">Forgot?</a>
                                        @error('password')
                                            <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="remember-me"
                                                {{ old('remember') ? 'checked' : '' }} name="remember" />
                                            <label for="remember-me">Rememeber me</label>
                                        </div>
                                    </div>
                                    <div class="form-group submtit">
                                        <button type="submit" class="ps-btn ps-btn--fullwidth mb-5">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ps-tab {{ request()->get('register') == 1 ? 'active' : '' }}" id="register">
                            <div class="ps-form__content">
                                <h5>Register An Account</h5>

                                <form action="{{ route('register') }}" method="post">
                                    @csrf

                                    @error('register')
                                        <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-group">
                                        <input name="name" value="{{ old('name') }}" class="form-control"
                                            type="text" placeholder="Your Name" />
                                        @error('name')
                                            <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input name="email" value="{{ old('email') }}" class="form-control"
                                            type="email" placeholder="Email address" />
                                        @error('email')
                                            <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password"
                                            name="password" />
                                        <small>The password must be at least 6 characters and must contain at least one
                                            number.</small>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback d-block" style="font-size: 14px" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Confirm Password"
                                            name="password_confirmation" />
                                    </div>
                                    <div class="form-group submtit">
                                        <button type="submit" class="ps-btn ps-btn--fullwidth mb-5">Login</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script>
        $(document).ready(function() {
            let searchParams = new URLSearchParams(window.location.search)
            if (searchParams.has('register')) {
                $('.tab-switch-register').trigger('click');
            }
        });
    </script> --}}
@endsection
