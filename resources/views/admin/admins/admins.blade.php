@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.admins') }}
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
                            <h3 class="box-title">{{ trans('admin/dashboard.admins') }} </h3>
                            <a href="{{ route('add.admin') }}"
                                class="btn btn-danger add-admin">{{ trans('admin/dashboard.add-admin') }}</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.image') }} </th>
                                            <th>{{ trans('admin/dashboard.name') }} </th>
                                            <th>{{ trans('admin/dashboard.email') }} </th>
                                            <th>{{ trans('admin/dashboard.role') }} </th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminuser as $item)
                                            <tr>
                                                <td> <img
                                                        src="{{ !empty($item->img) ? url(asset('upload/admin_images/'.$item->img)) : url('upload/no_image.jpg') }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->email }} </td>
                                                   
                                                <td>
                                                    @if (!empty($item->roles->pluck('name')[0]) && $item->roles->pluck('name')[0] != null)
                                                        {{ $item->roles->pluck('name')[0] }}
                                                    @endif
                                                </td>

                                                <td width="25%">
                                                    <a href="{{ route('edit.admin.user', $item->id) }}"
                                                        class="btn btn-info" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('delete.admin.user', $item->id) }}"
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
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
