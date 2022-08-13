@extends('layouts.master_home')
@section('home_content')

@section('title')
    {{ trans('site/layout.cart') }}
@endsection


<!-- Page Title
============================================= -->
<section id="page-title" style="background-color: #752651;">

    <div class="container clearfix">
        <h1 class="text-white">{{ trans('site/layout.cart') }}</h1>
        <ol class="breadcrumb">

        </ol>
    </div>

</section><!-- #page-title end -->

<div class="body-content">
    <div class="container">
        <div class="shopping-cart">
            <div class="shopping-cart-table ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cart-romove item">{{ trans('site/body.image') }}</th>
                                <th class="cart-description item">{{ trans('site/body.name') }}</th>
                                <th class="cart-qty item">{{ trans('site/body.qty') }}</th>
                                <th class="cart-sub-total item">{{ trans('site/body.subtotal') }}</th>
                                <th class="cart-total last-item">{{ trans('site/body.delete') }}</th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody id="cartPage">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">

            </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">
                @if (Session::has('coupon'))
                @else
                    <table class="table" id="couponField">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">{{ trans('site/body.discount-code') }}</span>
                                    <p>{{ trans('site/body.enter-discount-code') }}..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="{{ trans('site/body.discount-code') }}.." id="coupon_name">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary"
                                            onclick="applyCoupon()">{{ trans('site/body.activate-coupon') }}</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                @endif

            </div><!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead id="couponCalField">

                    </thead><!-- /thead -->
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <a href="{{ route('checkout') }}" type="submit"
                                        class="btn btn-primary checkout-btn">{{ trans('site/body.complete-payment') }}</a>

                                </div>
                            </td>
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->

        </div><!-- /.row -->
        <br>
    </div>

@endsection
