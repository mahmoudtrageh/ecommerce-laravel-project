@extends('layouts.master_home')
@section('title')
    {{ trans('site/body.order-details') }}
@endsection
@section('home_content')
    <!-- Content
              ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row">
    
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ trans('site/body.shipping-details') }}</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> {{ trans('site/body.name') }} : </th>
                                    <th> {{ $order->name }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/layout.phone') }} : </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/layout.email') }} : </th>
                                    <th> {{ $order->email }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/body.province') }} : </th>
                                    <th> {{ $order->provinces->name }} </th>
                                </tr>

                                <tr>
                                    <th> {{ trans('site/body.address') }} : </th>
                                    <th> {{ $order->address }} </th>
                                </tr>
                              
                                <tr>
                                    <th>{{ trans('site/body.postal-code') }} : </th>
                                    <th> {{ $order->post_code }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/body.date') }} : </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>
    
                            </table>
    
                        </div>
    
                    </div>
    
                </div> <!-- // end col md -5 -->
    
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ trans('site.order-details') }}
                                <span class="text-danger"> {{ trans('site/body.invoice') }} :
                                    {{ $order->invoice_no }}</span>
                            </h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> {{ trans('site/body.name') }} : </th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/layout.phone') }} : </th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/body.payment-method') }} : </th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>
    
                                <tr>
                                    <th> Tranx ID : </th>
                                    <th> {{ $order->transaction_id }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/layout.invoice-number') }} : </th>
                                    <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/body.total') }} : </th>
                                    <th>{{ $order->amount }} </th>
                                </tr>
    
                                <tr>
                                    <th> {{ trans('site/body.order') }} : </th>
                                    <th>
                                        <span class="badge badge-pill badge-warning"
                                            style="background: #418DB9;">{{ $order->status }} </span>
                                    </th>
                                </tr>
    
                            </table>
    
                        </div>
    
                    </div>
    
                </div> <!-- // 2ND end col md -5 -->
    
                <div class="row">
    
                    <div class="col-md-12">
    
                        <div class="table-responsive mt-5">
                            <table class="table">
                                <tbody>
    
                                    <tr style="background: #e2e2e2;">
                                        <td class="col-md-1">
                                            <label for=""> {{ trans('site/body.image') }}</label>
                                        </td>
    
                                        <td class="col-md-3">
                                            <label for=""> {{ trans('site/body.name') }} </label>
                                        </td>
    
                                        <td class="col-md-3">
                                            <label for=""> {{ trans('site/body.product-code') }}</label>
                                        </td>
    
                                        <td class="col-md-1">
                                            <label for=""> {{ trans('site/body.qty') }} </label>
                                        </td>
    
                                        <td class="col-md-1">
                                            <label for=""> {{ trans('site/body.price') }} </label>
                                        </td>
    
                                    </tr>
    
                                    @foreach ($orderItem as $item)
                                        <tr>
                                            <td class="col-md-1">
                                                <label for=""><img src="{{ asset($item->product->product_thambnail) }}"
                                                        height="50px;" width="50px;"> </label>
                                            </td>
    
                                            <td class="col-md-3">
                                                <label for=""> {{ $item->product->product_name }}</label>
                                            </td>
    
    
                                            <td class="col-md-3">
                                                <label for=""> {{ $item->product->product_code }}</label>
                                            </td>
    
    
                                            <td class="col-md-2">
                                                <label for=""> {{ $item->qty }}</label>
                                            </td>
    
                                            <td class="col-md-2">
                                                <label for=""> ${{ $item->price }} ( $ {{ $item->price * $item->qty }}
                                                    ) </label>
                                            </td>
    
                                        </tr>
                                    @endforeach
    
                                </tbody>
    
                            </table>
    
                        </div>
    
    
                    </div> <!-- / end col md 8 -->
    
                </div> <!-- // END ORDER ITEM ROW -->
    
                <br><br>
    
            </div> <!-- // end row -->

            </div>

        </div>
    </div>
</section><!-- #content end -->
@endsection
