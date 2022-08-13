@extends('layouts.master_home')
@section('home_content')
@section('title')
    {{ trans('site/body.reset-password') }}
@endsection

<!-- Page Title
============================================= -->
<section id="page-title" style="background-color: #752651;">

    <div class="container clearfix">
        <h1 class="text-white">{{ trans('site/body.reset-password') }}</h1>
        <ol class="breadcrumb">

        </ol>
    </div>

</section><!-- #page-title end -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in mt-5">
                    <h4 class="">{{ trans('site.reset-password') }}</h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">{{ trans('site/layout.email') }}
                                <span>*</span></label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">{{ trans('site/layout.password') }}
                                <span>*</span></label>
                            <input type="password" id="password" name="password"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <div class="form-group">
                            <label class="info-title"
                                for="exampleInputEmail1">{{ trans('site/body.password-confirmation') }}<span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <button type="submit"
                            class="btn-upper btn btn-primary checkout-page-button">{{ trans('site/body.reset-password') }}</button>
                    </form>

                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
