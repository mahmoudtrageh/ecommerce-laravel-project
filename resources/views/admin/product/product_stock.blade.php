@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.products-stock') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.stock-products') }} <span
                                    class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.image') }} </th>
                                            <th>{{ trans('admin/dashboard.product') }}</th>
                                            <th>{{ trans('admin/dashboard.price') }} </th>
                                            <th>{{ trans('admin/dashboard.qty') }} </th>
                                            <th>{{ trans('admin/dashboard.discount') }} </th>
                                            <th>{{ trans('admin/dashboard.status') }} </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->product_thambnail) }}"
                                                        style="width: 60px; height: 50px;"> </td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->selling_price }} $</td>
                                                <td>{{ $item->product_qty }} {{ trans('admin.pic') }}</td>

                                                <td>
                                                    @if ($item->discount_price == null)
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ trans('admin/dashboard.no-discount') }}</span>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;
                                                        @endphp
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ round($discount) }}
                                                            %</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">
                                                            {{ trans('admin/dashboard.active') }} </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">
                                                            {{ trans('admin/dashboard.not-active') }} </span>
                                                    @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
