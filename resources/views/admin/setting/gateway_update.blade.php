@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.gateway-settings') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin/sidebar.gateway-settings') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.gatewaysetting') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $gateway->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Google Api Client Id <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="google_client_id" class="form-control"
                                                            value="{{ $gateway->google_client_id }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Google App Secret <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="google_app_secret" class="form-control"
                                                            value="{{ $gateway->google_app_secret }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>STRIPE KEY <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="stripe_key" class="form-control"
                                                            value="{{ $gateway->stripe_key }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>STRIPE SECRET<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="stripe_secret" class="form-control"
                                                            value="{{ $gateway->stripe_secret }}">
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
