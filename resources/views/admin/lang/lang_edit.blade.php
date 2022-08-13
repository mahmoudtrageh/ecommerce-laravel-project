@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-lang') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Edit Slider Page -------- -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.edit-lang') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('update.lang',$langs->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $langs->id }}">
                                    <input type="hidden" name="old_image" value="{{ $langs->logo }}">

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.name') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $langs->name }}">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <h5>{{ trans('admin/dashboard.code') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="code" class="form-control"
                                                value="{{ $langs->code }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.logo') }}<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="logo" class="form-control">
                                            @error('logo')
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
