@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-submenu') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Add SubCategory Page -------- -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.edit-submenu') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('submenu.update') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $submenu->id }}">

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.menu-name') }}<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="menu_id" class="form-control">
                                                <option value="" selected="" disabled="">
                                                    {{ trans('admin/dashboard.select-menu') }}</option>
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}"
                                                        {{ $menu->id == $submenu->menu_id ? 'selected' : '' }}>
                                                            {{ $menu->menu_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('menu_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.name') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="submenu_name" class="form-control"
                                                value="{{ $submenu->submenu_name }}">
                                            @error('submenu_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.slug') }}<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="submenu_slug" class="form-control"
                                                value="{{ $submenu->submenu_slug }}">
                                            @error('submenu_slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.url') }}<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="url" class="form-control"
                                                value="{{ $submenu->url }}">
                                            @error('url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.icon') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="icon" class="form-control"
                                                value="{{ $submenu->icon }}">
                                            @error('icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.update') }}">
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
