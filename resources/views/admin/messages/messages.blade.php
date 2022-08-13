@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.messages') }}
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
                            <h3 class="box-title">{{ trans('admin/sidebar.messages') }} <span class="badge badge-pill badge-danger">
                                    {{ count($messages) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="15%">{{ trans('admin/dashboard.name') }} </th>
                                            <th scope="col" width="25%">{{ trans('admin/dashboard.email') }}</th>
                                            <th scope="col" width="15%">{{ trans('admin/dashboard.subject') }}</th>
                                            <th scope="col" width="15%">{{ trans('admin/dashboard.message') }}</th>
                                            <th scope="col" width="15%">{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $mess)
                                            <tr>
                                                <td> {{ $mess->name }} </td>
                                                <td> {{ $mess->email }} </td>
                                                <td> {{ $mess->subject }} </td>
                                                <td> {{ $mess->message }} </td>
                                                <td><a href="{{ route('message.delete', $mess->id) }}"
                                                    class="btn btn-danger" title="{{ trans('admin/dashboard.delete') }}"
                                                    id="delete">
                                                    <i class="fa fa-trash"></i></a></td>
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
