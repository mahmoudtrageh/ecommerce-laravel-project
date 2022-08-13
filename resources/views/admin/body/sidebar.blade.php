@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <a href="{{ url('admin/dashboard') }}">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    @php
                        $settings = DB::table('settings')->first();
                    @endphp
                    <img width="100" src="{{ asset($settings->logo) }}" alt="">
                </div>
            </a>
        </div>
        
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="ti-view-grid"></i>
                    <span>{{ trans('admin/sidebar.dashboard') }}</span>
                </a>
            </li>

            <li class="header nav-small-cap">{{ trans('admin/sidebar.general-settings') }}</li>

            <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-settings"></i>
                    <span>{{ trans('admin/sidebar.settings-management') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                            href="{{ route('site.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.site-settings') }}</a></li>

                    <li class="{{ $route == 'seo.setting' ? 'active' : '' }}"><a
                            href="{{ route('seo.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.seo-settings') }}</a></li>
                    <li class="{{ $route == 'email.setting' ? 'active' : '' }}"><a
                            href="{{ route('email.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.email-settings') }}</a></li>
                    <li class="{{ $route == 'all.lang' ? 'active' : '' }}"><a
                            href="{{ route('all.lang') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.lang-settings') }}</a></li>
                    <li class="{{ $route == 'gateway.setting' ? 'active' : '' }}"><a
                            href="{{ route('gateway.setting') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.gateway-settings') }}</a></li>
                    <li class="treeview {{ $prefix == '/menu' ? 'active' : '' }}  ">
                        <a href="#">
                            <i class="ti-view-list-alt"></i> <span>{{ trans('admin/sidebar.menu-settings') }} </span>
                            <span class="pull-left-container">
                                <i class="fa fa-angle-left pull-left"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ $route == 'all.menu' ? 'active' : '' }}"><a
                                    href="{{ route('all.menu') }}"><i
                                        class="ti-more"></i>{{ trans('admin/sidebar.menu') }}</a></li>
                            <li class="{{ $route == 'all.submenu' ? 'active' : '' }}"><a
                                    href="{{ route('all.submenu') }}"><i
                                        class="ti-more"></i>{{ trans('admin/sidebar.submenu') }}</a></li>
        
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="ti-user"></i>
                    <span>{{ trans('admin/sidebar.members') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء مدير'))
                        <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}"><a
                                href="{{ route('all.admin.user') }}"><i
                                    class="ti-more"></i>{{ trans('admin/sidebar.all-admins') }} </a></li>
                    @endif
                    <li class="{{ $route == 'all-users' ? 'active' : '' }}"><a href="{{ route('all-users') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.all-users') }}</a></li>

                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء صلاحية'))
                        <li class="{{ $route == 'permission.index' ? 'active' : '' }}"><a
                                href="{{ route('permission.index') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.permissions') }}</a>
                        </li>
                    @endif
                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء دور'))
                        <li class="{{ $route == 'role.index' ? 'active' : '' }}"><a
                                href="{{ route('role.index') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.roles') }}</a></li>
                    @endif

                </ul>

            </li>

            <li class="{{ $route == 'admin.message' ? 'active' : '' }}"><a href="{{ route('admin.message') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.messages') }}</a></li>

            <li class="header nav-small-cap">{{ trans('admin/sidebar.store') }}</li>

            <li class="treeview ">
                <a href="#">
                    <i class="ti-shopping-cart"></i>
                    <span>{{ trans('admin/sidebar.store-management') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

            <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.brands') }}</a></li>

            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-tag"></i> <span>{{ trans('admin/sidebar.category') }} </span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                            href="{{ route('all.category') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.all-categories') }}</a></li>
                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                            href="{{ route('all.subcategory') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.all-subcategories') }}</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-shopping-cart-full"></i>
                    <span>{{ trans('admin/sidebar.products') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                            href="{{ route('add-product') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.add-products') }}</a></li>

                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                            href="{{ route('manage-product') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.products-management') }}</a></li>

                </ul>
            </li>

            <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a href="{{ route('manage-coupon') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.coupons-management') }}</a></li>

            <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a
                    href="{{ route('manage-division') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.shipping') }}</a></li>
            <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-bag"></i>
                    @php
                        $pending_orders = DB::table('orders')
                            ->where('status', 'pending')
                            ->get();
                        
                    @endphp
                    <span>{{ trans('admin/sidebar.orders') }} <span class="badge badge-pill badge-danger">
                            {{ count($pending_orders) }} </span></span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending-orders' ? 'active' : '' }}"><a
                            href="{{ route('pending-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.pending-orders') }} <span
                                class="badge badge-pill badge-danger"> {{ count($pending_orders) }} </span></a></li>

                    <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                            href="{{ route('confirmed-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.confirmed-orders') }}</a></li>

                    <li class="{{ $route == 'processing-orders' ? 'active' : '' }}"><a
                            href="{{ route('processing-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.processed-orders') }}</a></li>

                    <li class="{{ $route == 'picked-orders' ? 'active' : '' }}"><a
                            href="{{ route('picked-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin/sidebar.picked-orders') }}</a></li>

                    <li class="{{ $route == 'shipped-orders' ? 'active' : '' }}"><a
                            href="{{ route('shipped-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin/sidebar.shipped-orders') }}</a></li>

                    <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                            href="{{ route('delivered-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin/sidebar.delivered-orders') }}</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-star"></i>
                    <span>{{ trans('admin/sidebar.reviews-management') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending.review' ? 'active' : '' }}"><a
                            href="{{ route('pending.review') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.pending-reviews') }}</a></li>

                    <li class="{{ $route == 'publish.review' ? 'active' : '' }}"><a
                            href="{{ route('publish.review') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.published-reviews') }}</a></li>


                </ul>
            </li>

            <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                    href="{{ route('product.stock') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.products-stock') }}</a></li>

            <li class="{{ $route == 'all-reports' ? 'active' : '' }}"><a href="{{ route('all-reports') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.all-reports') }}</a></li>

                </ul>

        </ul>
    </section>

</aside>
