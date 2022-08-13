@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.all-reports') }}
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
                            <h3 class="box-title">{{ trans('admin/sidebar.all-reports') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.date') }} </th>
                                            <th>{{ trans('admin/dashboard.invoice') }} </th>
                                            <th>{{ trans('admin/dashboard.amount') }} </th>
                                            <th>{{ trans('admin/dashboard.payment-method') }} </th>
                                            <th>{{ trans('admin/dashboard.status') }} </th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td> {{ $item->order_date }} </td>
                                                <td> {{ $item->invoice_no }} </td>
                                                <td> ${{ $item->amount }} </td>

                                                <td> {{ $item->payment_method }} </td>

                                                <td> <span class="badge badge-pill badge-primary">{{ $item->status }}
                                                    </span> </td>

                                                <td width="25%">
                                                    <a href="{{ route('pending.order.details', $item->id) }}"
                                                        class="btn btn-info" title="{{ trans('admin/dashboard.order-details') }}"><i
                                                            class="fa fa-eye"></i> </a>

                                                    <a target="_blank" href="{{ route('invoice.download', $item->id) }}"
                                                        class="btn btn-danger"
                                                        title="{{ trans('admin/dashboard.download') }}">
                                                        <i class="fa fa-download"></i></a>
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
