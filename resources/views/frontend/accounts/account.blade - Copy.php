@extends('layouts.websiteapp')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>


    <div class="ps-my-account-2">
        <div class="container">
            
          
                
           


            <div class="ps-section__wrapper">
                <div class="ps-section__left">
                    @if(Session::has('errorMsg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('errorMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="ps-form--account ps-tab-root" action="{{route('customar.register')}}" method="post">
                        @csrf
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#sign-in">Login</a></li>
                            <li><a href="#register">Register</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="sign-in">
                                <div class="ps-form__content">
                                    <h5>Log In Your Account</h5>
                   
                                    <div class="form-group">
                                        <input class="form-control" name="login_email" type="text" placeholder="Username or email address">
                                        @error('login_email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    

                                    <div class="form-group form-forgot">
                                        <input class="form-control" name="login_password" type="password" placeholder="Password"><a href="">Forgot?</a>
                                        @error('login_password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                  

                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                                            <label for="remember-me">Rememeber me</label>
                                        </div>
                                    </div>
                                    <div class="form-group submit">
                                        <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <div class="ps-tab" id="register">
                                <div class="ps-form__content">
                                    <h5>Register An Account</h5>
                                    
                                    <form method="post" action="">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" placeholder="Name">
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <input class="form-control" name="username" type="text" placeholder="username">
                                    </div>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email" placeholder="Email">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="text" placeholder="phone">
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <input class="form-control" name="password" type="password" placeholder="Password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
                                    </div>


                                    <div class="ps-form__decs">
                                        <div class="ps-radio">
                                            <input class="form-control" type="radio" id="user-type-1" name="user-type">
                                            <label for="user-type-1">I am a customer</label>
                                        </div>
                                        <div class="ps-radio">
                                            <input class="form-control" type="radio" id="user-type-2" name="user-type">
                                            <label for="user-type-2">I am a vendor</label>
                                        </div>
                                        <p>Your personal data will be used to support your experience throughout this website,
                                            to manage access to your account, and for other purposes described in our<a href="#">privacy policy.</a></p>
                                    </div>


                                    <div class="form-group submit">
                                        <button type="submit" class="ps-btn ps-btn--fullwidth">Register</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ps-section__right">
                    <figure class="ps-section__desc">
                        <figcaption>Sign up today and you will be able to:</figcaption>
                        <p>MartFury Buyer Protection has you covered from click to delivery. Sign up or sign in and you will be able to:</p>
                        <ul class="ps-list">
                            <li><i class="icon-credit-card"></i><span>SPEED YOUR WAY THROUGH CHECKOUT</span></li>
                            <li><i class="icon-clipboard-check"></i><span>TRACK YOUR ORDERS EASILY</span></li>
                            <li><i class="icon-bag2"></i><span>KEEP A RECORD OF ALL YOUR PURCHASES</span></li>
                        </ul>
                    </figure>
                    <div class="ps-section__coupon"><span>$25</span>
                        <aside>
                            <h5>A small gift for your first purchase</h5>
                            <p>Martfury give $25 as a small gift for your first purchase. Welcome to Martfury!</p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ps-newsletter">
    <div class="container">
        <form class="ps-form--newsletter" action="do_action" method="post">
            <div class="row">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__left">
                        <h3>Newsletter</h3>
                        <p>Subcribe to get information about products and coupons</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__right">
                        <div class="form-group--nest">
                            <input class="form-control" type="email" placeholder="Email address">
                            <button class="ps-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection