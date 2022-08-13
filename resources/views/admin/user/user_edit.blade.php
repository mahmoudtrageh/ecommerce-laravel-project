@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-user') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin.edit-admin') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.user.user.update') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $adminuser->id }}">
                                <input type="hidden" name="old_image" value="{{ $adminuser->img }}">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.firstname') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="first_name" class="form-control"
                                                            value="{{ $adminuser->first_name }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.lastname') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="last_name" class="form-control"
                                                            value="{{ $adminuser->last_name }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div> <!-- end row 	 -->

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.email') }} <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $adminuser->email }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.image') }} <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="file" name="img" class="form-control" id="image">
                                                    </div>
                                                </div>
                                            </div><!-- end cold md 6 -->

                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                    style="width: 100px; height: 100px;">

                                            </div><!-- end cold md 6 -->
                                        </div><!-- end row 	 -->

                                        <hr>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
