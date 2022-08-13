@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/header.profile') }}
@endsection
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                        <h6 class="widget-user-username">{{ trans('admin/dashboard.name') }}: {{ $adminData->name }} </h6>

                        <h6 class="widget-user-desc">{{ trans('admin/dashboard.email') }}: {{ $adminData->email }} </h6>

                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-success mb-5">
                            {{ trans('admin/dashboard.edit-profile') }}</a>

                    </div>
                    <div class="widget-user-image">

                        <img class="rounded-circle"
                            src="{{ !empty($adminData->img) ? url('upload/admin_images/'.$adminData->img) : url('upload/no_image.jpg') }}"
                            alt="User Avatar">

                    </div>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
