<header id="header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-between">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="#" class="standard-logo" data-dark-logo="{{asset('images/logo-side-dark.png')}}" data-mobile-logo="{{asset('images/logo.png')}}"><img src="{{asset('images/logo-side.png')}}" alt="Canvas Logo"></a>
                    <a href="#" class="retina-logo" data-dark-logo="{{asset('images/logo-side-dark@2x.png')}}" data-mobile-logo="{{asset('images/logo@2x.png')}}"><img src="{{asset('images/logo-side@2x.png')}}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <div class="header-misc">
                    <div class="d-flex my-lg-3">
                        <a href="https://www.facebook.com/MSTECSES" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="https://twitter.com/MSTECS_MX" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="https://www.linkedin.com/in/mstecsmx/" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>

                        <a href="https://github.com/z-alien117/dev-project" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>
                    </div>
                </div>

                {{-- Primary Navigation --}}
                <nav class="primary-menu on-click">

                    <ul class="menu-container">
                        <li class="menu-item {{Route::is('clients_view')?'current':''}}"><a class="menu-link" href="{{route('clients_view')}}"><div>Clients</div></a></li>
                        <li class="menu-item {{Route::is('products_view')?'current':''}}"><a class="menu-link" href="{{route('products_view')}}"><div>Products</div></a></li>
                        <li class="menu-item {{Route::is('invoices_view')?'current':''}}"><a class="menu-link" href="{{route('invoices_view')}}"><div>Invoices</div></a></li>
                    </ul>

                </nav>
                {{-- primary-menu end --}}

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>