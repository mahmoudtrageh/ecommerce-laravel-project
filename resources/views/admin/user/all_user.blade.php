@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.users') }}
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
                            <h3 class="box-title">{{ trans('admin/dashboard.users') }} <span
                                class="badge badge-pill badge-danger">
                                {{ count($users) }} </span></h3>
                            <a href="{{ route('add.user') }}"
                                class="btn btn-danger add-admin">{{ trans('admin/dashboard.add-user') }}</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.image') }} </th>
                                            <th>{{ trans('admin/dashboard.firstname') }} </th>
                                            <th>{{ trans('admin/dashboard.lastname') }} </th>
                                            <th>{{ trans('admin/dashboard.email') }}</th>
                                            <th>{{ trans('admin/dashboard.phone') }}</th>
                                            <th>{{ trans('admin/dashboard.status') }}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ !empty($user->img) ? url('upload/admin_images/'.$user->img) : url('upload/no_image.jpg') }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>

                                                <td>

                                                    <span
                                                        class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>

                                                </td>

                                                <td>
                                                    <a href="{{ route('edit.admin.user.user', $user->id) }} "
                                                        class="btn btn-info" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('delete.admin.user.user', $user->id) }} "
                                                        class="btn btn-danger" title="{{ trans('admin/dashboard.delete') }}"
                                                        id="delete">
                                                        <i class="fa fa-trash"></i></a>
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
                <!-- /.end col-12 -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
