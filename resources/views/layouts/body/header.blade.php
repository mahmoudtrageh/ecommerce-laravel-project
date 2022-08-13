<style>
    li {
        list-style: none;
    }

</style>
<!-- Header
  ============================================= -->
<header id="header" data-sticky-shrink="false" class="header-size-md border-bottom-0">
   
    <div id="header-wrap">
        
        <div class="header-row justify-content-between">

            <div id="logo" class="mr-2 my-4">
                @php
                    $settings = DB::table('settings')->first();
                @endphp
                <a href="{{ url('/') }}" class=""><img width="120" height="100"
                        src="{{ asset($settings->logo) }}" alt=""></a>
            </div><!-- #logo end -->

            <div id="primary-menu-trigger">
                <svg class="svg-trigger" viewBox="0 0 100 100">
                    <path
                        d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                    </path>
                    <path d="m 30,50 h 40"></path>
                    <path
                        d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                    </path>
                </svg>
            </div>

            <!-- Primary Navigation
            ============================================= -->
            <nav class="primary-menu flex-lg-grow-1 pr-5">

                @php
                    $menus = App\Models\Menu::all()->load('submenu');
                @endphp

                <ul class="menu-container">
                    @foreach ($menus as $menu)
                        <li class="menu-item">
                            @if($menu->url == '#')
                            <a class="menu-link" href="{{ $menu->url }}">
                                <div> {{ $menu->menu_name }}</div>
                            </a>
                            @elseif ($menu->url == 'categories')
                                 @php
                                $categories = App\Models\Category::latest()->get();
                                @endphp
                               
                               <a class="menu-link p-0" href="#"> {{ trans('admin/sidebar.all-categories') }}
                            
                                <ul class="sub-menu-container">
                                    @foreach($categories as $category)
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{route('shop.view',$category->id)}}">
                                                <div>{{ $category->category_name }}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </a>
                                   
                               
                            @else 
                            <a class="menu-link" href="{{ URL::to('/') }}/{{ $menu->url }}">
                                <div> {{ $menu->menu_name }}</div>
                            </a>
                            @endif

                            
                            @if ($menu->submenu->count())
                                <ul class="sub-menu-container">
                                    @foreach ($menu->submenu as $subitem)
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ URL::to('/') }}/{{ $subitem->url }}">
                                                <div>{{ $subitem->submenu_name }}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <ul class="header-icons">
                        <div id="top-cart" class="header-misc-icon d-inline-block position-relative px-2">
                            <a class="px-1" href="#" id="top-cart-trigger"><i
                                    class="fa-solid fa-basket-shopping"></i><span class="top-cart-number"
                                    id="cartQty"></span></a>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>{{ trans('site/layout.cart') }}</h4>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item">

                                        <!--   // Mini Cart Start with Ajax -->

                                        <li id="miniCart">

                                        </li>

                                        <!--   // End Mini Cart Start with Ajax -->

                                    </div>
                                </div>
                                <div class="top-cart-action">
                                    <span class="top-checkout-price" id="cartSubTotal"></span>
                                    <a href="{{ route('mycart') }}"
                                        class="button button-3d button-small m-0">{{ trans('site/layout.show-cart') }}</a>
                                </div>
                            </div>
                        </div><!-- #top-cart end -->

                        <div id="top-account" class="d-inline-block px-2">

                            @auth
                                <nav class="primary-menu ">
                                    <ul class="menu-container justify-content-lg-center">
                                        <li class="menu-item">
                                            <a class="menu-link px-1" href="#">
                                                <i style="top:2px;" class="fa-solid fa-user"></i>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item">
                                                    <a class="menu-link"
                                                        href="{{ route('profile.view', Auth::guard('web')->user()->id) }}">{{ Auth::guard('web')->user()->first_name }}
                                                        {{ Auth::guard('web')->user()->last_name }}</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="{{ route('mycart') }}">
                                                        <div>{{ trans('site/layout.cart') }}</div>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="{{ route('wishlist') }}">
                                                        <div>{{ trans('site/layout.wishlist') }}</div>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="#ordertraking" type="button"
                                                        data-lightbox="inline">
                                                        <div>{{ trans('site/layout.order-tracking') }}</div>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="{{ route('logout') }}">
                                                        <div>{{ trans('site/layout.logout') }}</div>
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>

                                    </ul>
                                </nav>
                            @else
                                <a class="px-1 position-relative header-icon" href="#modal-login" data-lightbox="inline"><i
                                        class="fas fa-sign-in-alt"></i></a>
                            @endauth

                        </div><!-- #top-search end -->

                        <div class="lang d-inline-block px-2">
                            <nav class="primary-menu ">
                                <ul class="menu-container justify-content-lg-center">
                                    <li class="menu-item">
                                        <a class="menu-link px-1" href="#">
                                            <i style="top:2px;" class="fas fa-globe"></i>
                                        </a>
                                        <ul class="sub-menu-container">
                                            @if (session()->get('lang') == 'ar')
                                                <li><a
                                                        href="{{ route('change.lang', ['lang' => 'en']) }}">الإنجليزية</a>
                                                </li>
                                            @else
                                                <li><a href="{{ route('change.lang', ['lang' => 'ar']) }}">Arabic</a>
                                                </li>
                                            @endif
                                        </ul>

                                    </li>

                                </ul>
                            </nav>
                        </div><!-- #top-search end -->
                    </ul>
                </ul>

            </nav><!-- #primary-menu end -->

            <!-- Login/Register Modal -->
            <div class="modal-register mfp-hide" id="modal-login">
                <div class="card mx-auto" style="max-width: 540px;">
                    <div class="card-header py-3 bg-transparent center">
                        <h3 class="mb-0 font-weight-normal">{{ trans('site/layout.welcome-back') }}</h3>
                    </div>
                    <div class="card-body mx-auto py-5" style="max-width: 70%;">

                        <a href="#"
                            class="button button-large btn-block si-colored si-facebook nott font-weight-normal ls0 center m-0"><i
                                class="icon-facebook-sign"></i>{{ trans('site/layout.login-facebook') }}</a>

                        <div class="divider divider-center"><span class="position-relative"
                                style="top: -2px">{{ trans('site/layout.or') }}</span>
                        </div>

                        <form id="login-form" name="login-form" class="mb-0 row" action="{{ route('login') }}"
                            method="post">
                            @csrf
                            <div class="col-12">
                                <input type="text" id="login-form-username" name="email" value=""
                                    class="form-control not-dark" placeholder="{{ trans('site/layout.email') }}" />
                            </div>

                            <div class="col-12 mt-4">
                                <input type="password" id="login-form-password" name="password" value=""
                                    class="form-control not-dark"
                                    placeholder="{{ trans('site/layout.password') }}" />
                            </div>

                            <div class="col-12 forget-password mt-3">
                                <a href="{{ route('password.request') }}"
                                    class="text-dark font-weight-light mt-2">{{ trans('site/layout.forget-password') }}?</a>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit"
                                    class="button btn-block m-0">{{ trans('site/layout.login') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-4 center">
                        <p class="mb-0">{{ trans('site/layout.dont-have-account') }}? <a
                                href="#modal-register"
                                data-lightbox="inline"><u>{{ trans('site/layout.register') }}</u></a></p>
                    </div>
                </div>
            </div>

            <div class="modal-register mfp-hide" id="modal-register">
                <div class="card mx-auto" style="max-width: 540px;">
                    <div class="card-header py-3 bg-transparent center">
                        <h3 class="mb-0 font-weight-normal">{{ trans('site/layout.register-account') }}</h3>
                    </div>
                    <div class="card-body mx-auto py-5" style="max-width: 70%;">


                        <form id="login-form" name="login-form" class="mb-0 row login-form"
                            action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="col-12 form-group">
                                <label class="info-title"
                                    for="exampleInputEmail1">{{ trans('site/layout.firstname') }}
                                    <span>*</span></label>
                                <input type="text" id="first_name" name="first_name"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 form-group">
                                <label class="info-title pt-3"
                                    for="exampleInputEmail1">{{ trans('site/layout.lastname') }}
                                    <span>*</span></label>
                                <input type="text" id="last_name" name="last_name"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 form-group">
                                <label class="info-title pt-3"
                                    for="exampleInputEmail2">{{ trans('site/layout.email') }}
                                    <span>*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 form-group">
                                <label class="info-title pt-3"
                                    for="exampleInputEmail1">{{ trans('site/layout.phone') }}
                                    <span>*</span></label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 form-group">
                                <label class="info-title pt-3"
                                    for="exampleInputEmail1">{{ trans('site/layout.password') }}
                                    <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 form-group">
                                <label class="info-title pt-3"
                                    for="exampleInputEmail1">{{ trans('site/layout.password-confirmation') }}
                                    <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit"
                                    class="button btn-block m-0">{{ trans('site/layout.register') }}</button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer py-4 center">
                        <p class="mb-0">{{ trans('site/layout.have-account') }}? <a href="#modal-login"
                                data-lightbox="inline"><u>{{ trans('site/layout.login') }}</u></a></p>
                    </div>
                </div>
            </div>

            <!-- Order Traking Modal -->
            <div class="modal-register mfp-hide" id="ordertraking">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{ trans('site/layout.track-your-order') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="{{ route('order.tracking') }}">
                                @csrf
                                <div class="modal-body">
                                    <label>{{ trans('site/layout.invoice-number') }}</label>
                                    <input type="text" name="code" required="" class="form-control"
                                        placeholder="{{ trans('site/layout.invoice-number') }}">
                                </div>

                                <button class="btn btn-danger" type="submit" style="margin-left: 17px;">
                                    {{ trans('site/layout.track-now') }} </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Traking Modal -->

        </div>

    </div>

</header><!-- #header end -->
