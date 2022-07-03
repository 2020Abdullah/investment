<!-- Header-section -->
<header class="header header-fixed fadeInDown animated" id="header">
    <div class="bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-2 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="row">
                        <div class="col-6 d-xl-none d-lg-none d-block">
                            <button class="navbar-toggler" type="button">
                                <span class="dag"></span>
                                <span class="dag2"></span>
                                <span class="dag3"></span>
                            </button>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center justify-content-end">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{asset('assets/img/brand/brand.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-10">
                    <div class="mainmenu">
                        <div class="d-xl-none d-lg-none d-block">
                            <div class="user-profile">
                                <div class="user-info">
                                    <span class="user-name">
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @else
                                            <a class="nav-link" href="{{route('login')}}">تسجيل الدخول</a>
                                        @endif
                                    </span>
                                </div>
                                <div class="log-out-area">
                                    <li class="nav-item join-now-btn">
                                        @if (Auth::check())
                                            <a class="nav-link" href="{{ route('home') }}">
                                                لوحة التحكم
                                            </a>
                                            <a class="nav-link logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                تسجيل الخروج
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @else
                                            <a class="nav-link" href="{{route('login')}}">تسجيل الدخول</a>
                                        @endif
                                    </li>
                                </div>
                            </div>
                        </div>
                        <nav class="navbar navbar-expand-lg">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item show">
                                        <a class="nav-link" href="/">
                                            الرئيسية
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('Pages.question')}}">أهم الأسئلة<span class="sr-only"></span></a>
                                    </li>

                                    <li class="nav-item show">
                                        <a class="nav-link" href="{{route('Pages.about')}}">
                                            عن الشركة
                                        </a>
                                    </li>

                                    <li class="nav-item show">
                                        <a class="nav-link" href="#feature">
                                             أهم المميزات
                                        </a>
                                    </li>

                                    <li class="nav-item show">
                                        <a class="nav-link" href="#statics">
                                            إحصائيات عملائنا
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('plans-pricing')}}">خطط الإستثمار</a>
                                    </li>
                                    <li class="nav-item join-now-btn">
                                        @if (Auth::check())
                                            @if ( Auth::user()->is_admin === 0)
                                                <a class="nav-link" href="{{ route('home') }}">
                                                    لوحة التحكم
                                                </a>
                                            @else
                                                <a class="nav-link" href="{{ route('admin.home') }}">
                                                    لوحة التحكم
                                                </a>
                                            @endif
                                        @else
                                            <a class="nav-link" href="{{route('login')}}">تسجيل الدخول</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header-section -->
