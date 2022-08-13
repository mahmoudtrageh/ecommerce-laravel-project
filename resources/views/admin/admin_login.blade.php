<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets
 ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/style-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/css/all.min.css') }}" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @php
        $settings = DB::table('settings')->first();
        $route = Route::current()->getName();
    @endphp

    <link rel="icon" href="{{ asset($settings->favicon) }}" type="image/gif" sizes="16x16">

    <title>
        {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.login') }}
    </title>
</head>

<body class="stretched">

    <!-- Content
  ============================================= -->
    <section id="content">
        <div class="content-wrap py-0">

            <div class="section dark p-0 m-0 h-100 position-absolute"></div>

            <div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
                <div class="vertical-middle">
                    <div class="container py-5">

                        <div class="text-center">
                            <a href="index.html"><img src="{{ asset($settings->logo) }}" alt="Canvas Logo"
                                    style="height: 100px;"></a>
                        </div>

                        <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                            <div class="card-body" style="padding: 40px;">
                                <form id="login-form" name="login-form" class="mb-0" method="POST"
                                    action="{{ route('admin.login') }}">
                                    @csrf
                                    <h3>{{ trans('admin/dashboard.login-admin-dashboard') }}</h3>

                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label
                                                for="login-form-username">{{ trans('admin/dashboard.email') }}</label>
                                            <input type="text" id="login-form-username" name="email" value=""
                                                class="form-control not-dark" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label
                                                for="login-form-password">{{ trans('admin/dashboard.password') }}</label>
                                            <input type="password" id="login-form-password" name="password" value=""
                                                class="form-control not-dark" />
                                        </div>

                                        <div class="col-12 form-group mb-0">
                                            <button class="button button-3d button-black my-3 d-block"
                                                id="login-form-submit" name="login-form-submit"
                                                value="login">{{ trans('admin/dashboard.login') }}</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="text-center text-muted mt-3"><small>&copy;
                                {{ trans('admin/dashboard.copyright') }}
                            </small></div>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- #content end -->

    <script src="{{ asset('home/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('home/assets/js/plugins.min.js') }}"></script>

    <!-- Range Slider Plugin -->
    <script src="{{ asset('home/assets/js/components/rangeslider.min.js') }}"></script>


    <!-- Footer Scripts
============================================= -->
    <script src="{{ asset('home/assets/js/functions.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>
</body>

</html>
