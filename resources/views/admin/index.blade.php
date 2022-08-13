@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.home') }}
@endsection
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin/dashboard.today-sales') }}</p>
                                <h3 class="mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin/dashboard.month-sales') }} </p>
                                <h3 class="mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin/dashboard.year-sales') }} </p>
                                <h3 class=" mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin/sidebar.pending-orders') }} </p>
                                <h3 class=" mb-0 font-weight-500"> <small class="text-success">
                                        {{ count($orders) }} {{ trans('admin/dashboard.order') }} </small></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                {{ trans('admin/dashboard.recent-orders') }}

                            </h4>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>

                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 250px"><span
                                                    class="">{{ trans('admin/dashboard.date') }}</span></th>
                                            <th style="min-width: 100px"><span
                                                    class="text-fade">{{ trans('admin/dashboard.invoice') }}</span></th>
                                            <th style="min-width: 100px"><span
                                                    class="text-fade">{{ trans('admin/dashboard.amount') }}</span></th>
                                            <th style="min-width: 150px"><span
                                                    class="text-fade">{{ trans('admin/dashboard.payment-method') }}</span></th>
                                            <th style="min-width: 130px"><span
                                                    class="text-fade">{{ trans('admin/dashboard.status') }}</span></th>
                                            <th style="min-width: 120px"><span
                                                    class="text-fade">{{ trans('admin/dashboard.process') }}</span> </th>
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

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
