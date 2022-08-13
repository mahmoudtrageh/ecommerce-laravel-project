@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.menu-elements') }}
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
                            <h3 class="box-title">{{ trans('admin/dashboard.menu-elements') }} <span
                                    class="badge badge-pill badge-danger"> {{ count($menu) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.name') }}</th>
											<th>{{ trans('admin/dashboard.slug') }}</th>
											<th>{{ trans('admin/dashboard.url') }}</th>
											<th>{{ trans('admin/dashboard.icon') }}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menu as $item)
                                            <tr>
                                                <td>{{ $item->menu_name }}</td>
												<td>{{ $item->menu_slug }}</td>
												<td>{{ $item->url }}</td>
												<td>{{ $item->icon }}</td>
                                                <td>
                                                    <a href="{{ route('menu.edit', $item->id) }}"
                                                        class="btn btn-info" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('menu.delete', $item->id) }}"
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

                <!--   ------------ Add Category Page -------- -->
                <div class="col-lg-6 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.add-menu') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('menu.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.name') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="menu_name" class="form-control">
                                            @error('menu_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

									<div class="form-group">
                                        <h5>{{ trans('admin/dashboard.slug') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="menu_slug" class="form-control">
                                            @error('menu_slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

									<div class="form-group">
                                        <h5>{{ trans('admin/dashboard.url') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="url" class="form-control">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <h5>{{ trans('admin/dashboard.icon') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="icon" class="form-control">
                                            @error('icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.add') }}">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
