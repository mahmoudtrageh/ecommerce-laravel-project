@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.about-site') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin/sidebar.about-site') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeabout->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.title') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $homeabout->title }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.short-desc') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="short_dis" class="form-control"
                                                            value="{{ $homeabout->short_dis }}">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.long-desc') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="long_dis" class="form-control"
                                                            value="{{ $homeabout->long_dis }}">

                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div> <!-- end row 	 -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="{{trans('admin/dashboard.update')}}">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
@endsection
