@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.reports') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Add Search Page -------- -->
                <div class="col-lg-4 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.search-by-date') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('search-by-date') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.select-date') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control">
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.search') }}">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-lg-4 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.search-by-month') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('search-by-month') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.select-month') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="month" class="form-control">
                                                <option label="{{ trans('admin/dashboard.select') }}"></option>
                                                <option value="January">{{ trans('admin/dashboard.january') }}</option>
                                                <option value="February">{{ trans('admin/dashboard.february') }}</option>
                                                <option value="March">{{ trans('admin/dashboard.march') }}</option>
                                                <option value="April">{{ trans('admin/dashboard.april') }}</option>
                                                <option value="May">{{ trans('admin/dashboard.may') }}</option>
                                                <option value="Jun">{{ trans('admin/dashboard.june') }}</option>
                                                <option value="July">{{ trans('admin/dashboard.july') }}</option>
                                                <option value="August">{{ trans('admin/dashboard.august') }}</option>
                                                <option value="September">{{ trans('admin/dashboard.september') }}</option>
                                                <option value="October">{{ trans('admin/dashboard.october') }}</option>
                                                <option value="November">{{ trans('admin/dashboard.november') }}</option>
                                                <option value="December">{{ trans('admin/dashboard.december') }}</option>

                                            </select>

                                            @error('month')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.search-by-year') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="year_name" class="form-control">
                                                <option label="{{ trans('admin/dashboard.select') }}"></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>

                                            @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.search') }}">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-lg-4 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.search-by-year') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('search-by-year') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.select-year') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="year" class="form-control">
                                                <option label="{{ trans('admin/dashboard.select') }}"></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>

                                            @error('year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.search') }}">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <!--   ------------End  Add Search Page -------- -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
