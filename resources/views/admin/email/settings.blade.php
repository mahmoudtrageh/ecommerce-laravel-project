@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.email-settings') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin/sidebar.email-settings') }}</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.emailsetting') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $email_setting->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Driver <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="driver" class="form-control"
                                                            value="{{ $email_setting->driver }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Host <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="host" class="form-control"
                                                            value="{{ $email_setting->host }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Port <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="port" class="form-control"
                                                            value="{{ $email_setting->port }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.username') }} <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="username" class="form-control"
                                                            value="{{ $email_setting->username }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.password') }}<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="password" class="form-control"
                                                            value="{{ $email_setting->password }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Encryption<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="encryption" class="form-control"
                                                            value="{{ $email_setting->encryption }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>From Address<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="from_address" class="form-control"
                                                            value="{{ $email_setting->from_address }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>From Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="from_name" class="form-control"
                                                            value="{{ $email_setting->from_name }}">
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
