@extends('layouts.websiteapp')
@section('content')
<div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Verification</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account">
            <div class="container">
            @if(Session::has('errorMsg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('errorMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="ps-form--account ps-tab-root" action="{{route('customar.email.forgot.passwrod')}}" method="post">
                        @csrf
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                                    <h5>Get A Link</h5>

                                    <div class="form-group form-forgot">
                                        <input class="form-control" name="phone_email" type="text" placeholder="Enter Your Email or Phone Number">
                                        @error('phone_email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group submit">
                                        <button type="submit" class="ps-btn ps-btn--fullwidth">Send A Link</button>
                                    </div>
                                </div>
                            <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
</form>
                     
    </div>
    @include('frontend.include.newsletter._subcribtion')
@endsection