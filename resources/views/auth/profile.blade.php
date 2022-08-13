@extends('layouts.master_home')
@section('title')
    {{ trans('site/body.profile') }}
@endsection
@section('home_content')
    <!-- Content
                      ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-md-12">

                        <img src="{{ !empty(Auth::guard('web')->user()->img)? url('upload/admin_images/' . Auth::guard('web')->user()->img): url('upload/no_image.jpg') }}"
                            class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">

                        <div class="heading-block border-0">
                            <h3>{{ Auth::guard('web')->user()->first_name }} {{ Auth::guard('web')->user()->last_name }}
                            </h3>
                        </div>

                        <div class="clear"></div>

                        <div class="row clearfix mt-3">

                            <div class="col-lg-12">

                                <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tab-feeds"><i class="fa-solid fa-cart-shopping"></i>
                                                {{ trans('site/body.orders') }}</a></li>
                                        <li><a href="#tab-posts"><i class="fa-solid fa-user"></i>
                                                {{ trans('site/body.personal-information') }}</a></li>
                                        <li><a href="#tab-connections"><i
                                                    class="icon-users"></i>{{ trans('site/body.change-password') }}</a>
                                        </li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tab-feeds">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>

                                                        <tr style="background: #e2e2e2;">
                                                            <td class="col-md-1">
                                                                <label for=""> {{ trans('site/body.date') }}</label>
                                                            </td>

                                                            <td class="col-md-3">
                                                                <label for=""> {{ trans('site/body.total') }}</label>
                                                            </td>

                                                            <td class="col-md-3">
                                                                <label for="">
                                                                    {{ trans('site/body.payment-method') }}</label>
                                                            </td>


                                                            <td class="col-md-2">
                                                                <label for="">
                                                                    {{ trans('site/layout.invoice-number') }}</label>
                                                            </td>

                                                            <td class="col-md-2">
                                                                <label for=""> {{ trans('site/body.order') }}</label>
                                                            </td>

                                                            <td class="col-md-1">
                                                                <label for=""> {{ trans('site/body.action') }} </label>
                                                            </td>

                                                        </tr>

                                                        @foreach ($orders as $order)
                                                            <tr>
                                                                <td class="col-md-1">
                                                                    <label for=""> {{ $order->order_date }}</label>
                                                                </td>

                                                                <td class="col-md-3">
                                                                    <label for=""> ${{ $order->amount }}</label>
                                                                </td>


                                                                <td class="col-md-3">
                                                                    <label for=""> {{ $order->payment_method }}</label>
                                                                </td>

                                                                <td class="col-md-2">
                                                                    <label for=""> {{ $order->invoice_no }}</label>
                                                                </td>

                                                                <td class="col-md-2">
                                                                    <label for="">

                                                                        @if ($order->status == 'pending')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #800080;color:#fff;">
                                                                                {{ trans('site/body.pending') }} </span>
                                                                        @elseif($order->status == 'confirm')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #0000FF;color:#fff;">
                                                                                {{ trans('site/body.confirm') }} </span>
                                                                        @elseif($order->status == 'processing')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #FFA500;color:#fff;">
                                                                                {{ trans('site/body.processed') }}
                                                                            </span>
                                                                        @elseif($order->status == 'picked')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #808000;color:#fff;">
                                                                                {{ trans('site/body.picked') }} </span>
                                                                        @elseif($order->status == 'shipped')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #808080;color:#fff;">
                                                                                {{ trans('site/body.shipped') }} </span>
                                                                        @elseif($order->status == 'delivered')
                                                                            <span class="badge badge-pill badge-warning p-3"
                                                                                style="background: #008000;color:#fff;">
                                                                                {{ trans('site/body.delivered') }}
                                                                            </span>
                                                                        @endif
                                                                    </label>
                                                                </td>

                                                                <td class="col-md-1">
                                                                    <a href="{{ url('user/order_details/' . $order->id) }}"
                                                                        class="btn btn-sm btn-primary"><i
                                                                            class="fa fa-eye"></i>
                                                                        {{ trans('site/body.view') }}</a>

                                                                    <a target="_blank"
                                                                        href="{{ url('user/invoice_download/' . $order->id) }}"
                                                                        class="btn btn-sm btn-danger"
                                                                        style="margin-top: 5px;"><i class="fa fa-download"
                                                                            style="color: white;"></i>
                                                                        {{ trans('site/body.invoice') }} </a>

                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-posts">

                                            <div class="card">
                                                <h3 class="text-center mb-0 mt-3"><span
                                                        class="text-danger">{{ trans('site/body.profile-update') }} </h3>

                                                <div class="card-body">

                                                    <form method="post" action="{{ route('user.profile.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/layout.firstname') }} <span>
                                                                </span></label>
                                                            <input type="text" name="first_name" class="form-control"
                                                                value="{{ $user->first_name }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/layout.lastname') }} <span>
                                                                </span></label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                value="{{ $user->last_name }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/layout.email') }} <span>
                                                                </span></label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $user->email }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/layout.phone') }} <span>
                                                                </span></label>
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{ $user->phone }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/body.image') }}<span>
                                                                </span></label>
                                                            <input type="file" name="img" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('site/body.update') }}</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="tab-content clearfix" id="tab-connections">

                                            <div class="card">
                                                <h3 class="text-center mb-0 mt-3"><span
                                                        class="text-danger">{{ trans('site/body.change-password') }}</span><strong>
                                                    </strong> </h3>

                                                <div class="card-body">

                                                    <form method="post" action="{{ route('user.password.update') }}">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/body.current-password') }}<span>
                                                                </span></label>
                                                            <input type="password" id="current_password" name="oldpassword"
                                                                class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/body.new-password') }}<span>
                                                                </span></label>
                                                            <input type="password" id="password" name="password"
                                                                class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title"
                                                                for="exampleInputEmail1">{{ trans('site/body.password-confirmation') }}<span>
                                                                </span></label>
                                                            <input type="password" id="password_confirmation"
                                                                name="password_confirmation" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('site/body.update') }}</button>
                                                        </div>

                                                    </form>
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
    </section><!-- #content end -->
@endsection
