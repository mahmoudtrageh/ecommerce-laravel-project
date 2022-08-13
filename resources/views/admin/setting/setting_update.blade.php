@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.site-settings') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin/sidebar.site-settings') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.sitesetting') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $setting->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.site-logo') }} <span class="text-danger">
                                                        </span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="file" name="logo" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <img src="{{ asset($setting->logo) }}"
                                                        style="width:400px; height:200px;">

                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.site-favicon') }} <span class="text-danger">
                                                        </span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="file" name="favicon" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <img src="{{ asset($setting->favicon) }}"
                                                        style="width:100px; height:100px;">

                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.phone-one') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_one" class="form-control"
                                                            value="{{ $setting->phone_one }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.phone-two') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" class="form-control"
                                                            value="{{ $setting->phone_two }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.email') }} <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $setting->email }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.name') }} <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="site_name" class="form-control"
                                                            value="{{ $setting->site_name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.address') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ $setting->address }}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.facebook') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" class="form-control"
                                                            value="{{ $setting->facebook }}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.twitter') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="twitter" class="form-control"
                                                            value="{{ $setting->twitter }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.linkedin') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" class="form-control"
                                                            value="{{ $setting->linkedin }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.youtube') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" class="form-control"
                                                            value="{{ $setting->youtube }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.instagram') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="instagram" class="form-control"
                                                            value="{{ $setting->instagram }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Github <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="github" class="form-control"
                                                            value="{{ $setting->github }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div> <!-- end row 	 -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="{{ trans('admin/dashboard.update') }}">
                                        </div>
                                    </div>
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
