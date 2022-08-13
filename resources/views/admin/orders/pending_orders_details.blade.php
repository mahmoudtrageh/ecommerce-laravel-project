@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.order-details') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="">
                    <h3 class="page-title">{{ trans('admin/dashboard.order-details') }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ trans('admin/dashboard.order-details') }}
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>{{ trans('admin/dashboard.shipping-details') }}</strong> </h4>
                        </div>

                        <table class="table">
                            <tr>
                                <th> {{ trans('admin/dashboard.name') }} : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.phone') }} : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.email') }} : </th>
                                <th> {{ $order->email }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.province') }} : </th>
                                <th> {{ $order->provinces->name }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.address') }} : </th>
                                <th> {{ $order->address }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.postal-code') }} : </th>
                                <th> {{ $order->post_code }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.date') }} : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>

                        </table>

                    </div>
                </div> <!--  // cod md -6 -->

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>{{ trans('admin/dashboard.order-details') }}</strong><span
                                    class="text-danger"> {{ trans('admin/dashboard.invoice') }} :
                                    {{ $order->invoice_no }}</span></h4>
                        </div>

                        <table class="table">
                            <tr>
                                <th> {{ trans('admin/dashboard.name') }} : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.phone') }} : </th>
                                <th> {{ $order->user->phone }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.payment-method') }} : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Tranx ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.invoice') }} : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.total') }} : </th>
                                <th>${{ $order->amount }} </th>
                            </tr>

                            <tr>
                                <th> {{ trans('admin/dashboard.status') }} : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>
                            </tr>

                            <tr>
                                <th> </th>
                                <th>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('pending-confirm', $order->id) }}"
                                            class="btn btn-block btn-success"
                                            id="confirm">{{ trans('admin/dashboard.confirm-order') }}</a>
                                    @elseif($order->status == 'confirm')
                                        <a href="{{ route('confirm.processing', $order->id) }}"
                                            class="btn btn-block btn-success"
                                            id="processing">{{ trans('admin/dashboard.process-order') }}</a>
                                    @elseif($order->status == 'processing')
                                        <a href="{{ route('processing.picked', $order->id) }}"
                                            class="btn btn-block btn-success"
                                            id="picked">{{ trans('admin/dashboard.pick-order') }}</a>
                                    @elseif($order->status == 'picked')
                                        <a href="{{ route('picked.shipped', $order->id) }}"
                                            class="btn btn-block btn-success"
                                            id="shipped">{{ trans('admin/dashboard.ship-order') }}</a>
                                    @elseif($order->status == 'shipped')
                                        <a href="{{ route('shipped.delivered', $order->id) }}"
                                            class="btn btn-block btn-success"
                                            id="delivered">{{ trans('admin/dashboard.deliver-order') }}</a>
                                    @endif

                                </th>
                            </tr>

                        </table>
                    </div>
                </div> <!--  // cod md -6 -->

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">

                        </div>

                        <table class="table">
                            <tbody>

                                <tr>
                                    <td>
                                        <label for=""> {{ trans('admin/dashboard.image') }}</label>
                                    </td>

                                    <td>
                                        <label for=""> {{ trans('admin/dashboard.name') }} </label>
                                    </td>

                                    <td>
                                        <label for="">{{ trans('admin/dashboard.product-code') }}</label>
                                    </td>

                                    <td>
                                        <label for=""> {{ trans('admin/dashboard.qty') }} </label>
                                    </td>

                                    <td>
                                        <label for=""> {{ trans('admin/dashboard.price') }} </label>
                                    </td>

                                </tr>

                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td>
                                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>

                                        <td>
                                            <label for=""> {{ $item->product->product_name }} </label>
                                        </td>


                                        <td>
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td>
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td>
                                            <label for=""> ${{ $item->price }} ( $ {{ $item->price * $item->qty }} )
                                            </label>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div> <!--  // cod md -12 -->

            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
