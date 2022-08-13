@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-admin') }}
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin/dashboard.edit-admin') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $adminuser->id }}">
                                <input type="hidden" name="old_image" value="{{ $adminuser->img }}">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.name') }} 
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $adminuser->name }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.email') }} 
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $adminuser->email }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5><b>{{ trans('admin/dashboard.choose-role') }} </b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="roles" class="form-control" required="">
                                                            @if (!empty($adminuser->roles->pluck('name')[0]) && $adminuser->roles->pluck('name')[0] != null)
                                                                <option value="{{ $adminuser->roles->pluck('name')[0] }}"
                                                                    selected="" disabled="">
                                                                @else
                                                                <option value="" selected="" disabled="">
                                                            @endif
                                                            {{ trans('admin/dashboard.role') }}</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('roles')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group -->

                                            </div> <!-- end cold md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.password') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                        </div> <!-- end row 	 -->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.image') }}
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

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.choose-permissions') }} <span class="text-danger">*</span>
                                                    </h5>
                                                    @foreach ($permissions as $permission)
                                                        <div class="controls">
                                                            <input type="checkbox" name="permissions[]"
                                                                id="{{ $permission->name }}{{ $permission->id }}"
                                                                value="{{ $permission->name }}"
                                                                @if (in_array($permission->id, $rolePermissions)) checked @endif
                                                                class="form-control">
                                                            <label
                                                                for="{{ $permission->name }}{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div> <!-- end cold md 6 -->
                                        </div>

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
