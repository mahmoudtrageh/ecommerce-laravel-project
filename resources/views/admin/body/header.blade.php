<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
        <!-- Sidebar toggle button-->

        <ul class="nav">
            <li class="btn-group nav-item">
                <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu"
                    role="button">
                    <i class="nav-link-icon mdi mdi-menu"></i>
                </a>
            </li>
            <li class="btn-group nav-item">
                <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                    title="Full Screen">
                    <i class="nav-link-icon mdi mdi-crop-free"></i>
                </a>
            </li>

            <div class="navbar-custom-menu">
                <ul class="nav px-2">
                    <!-- lang-->
                    <li class="btn-group nav-item dropdown mt-3">
                        <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                            title="User">
                            <i class="ti-world mt-3"></i>
                        </a>
                        <ul class="dropdown-menu animated flipInX p-3">
                            <li class="user-body">
                                @if (session()->get('lang') == 'ar')
                                    <a href="{{ route('change.lang', ['lang' => 'en']) }}">الإنجليزية</a>
                                @else
                                    <a href="{{ route('change.lang', ['lang' => 'ar']) }}">Arabic</a>
                                @endif
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </ul>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">

                @php
                    
                    $id = Auth::guard('admin')->user()->id;
                    $adminData = DB::table('admins')->find($id);
                    
                @endphp

                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                        title="User">
                        <img src="{{ !empty($adminData->img) ? url(asset('/upload/admin_images/'.$adminData->img)) : url('upload/no_image.jpg') }}"
                            alt="">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                    class="ti-user text-muted mr-2"></i> {{ trans('admin/header.profile') }}</a>

                            <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i
                                    class="ti-wallet text-muted mr-2"></i>{{ trans('admin/header.change-password') }}</a>

                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i
                                    class="ti-settings text-muted mr-2"></i>{{ trans('admin/header.settings') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                    class="ti-lock text-muted mr-2"></i>{{ trans('admin/header.logout') }}</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
