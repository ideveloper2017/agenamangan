<header id="ts-header" class="fixed-top">

    <!-- SECONDARY NAVIGATION
    =============================================================================================================-->
    <nav id="ts-secondary-navigation" class="navbar p-0">
        <div class="container justify-content-end justify-content-sm-between">


            <div class="navbar-nav d-none d-sm-block" style="display:none;">
                <!--Phone-->
                <span class="mr-4">
                            <i class="fa fa-phone-square mr-1"></i>
                            +1 123 456 789
                        </span>
                <!--Email-->
                <a href="#">
                    <i class="fa fa-envelope mr-1"></i>
                    hello@example.com
                </a>
            </div>

            <!--Right Side-->
            <div class="navbar-nav flex-row">

                <!--Search Input-->
                <input type="text" class="form-control p-2 border-left bg-transparent w-auto" placeholder="Search">

                <!--Currency Select-->
                <select class="custom-select bg-transparent ts-text-small border-left" id="currency" name="currency"  style="display:none">
                    <option value="1">GBP</option>
                    <option value="2">USD</option>
                    <option value="3">EUR</option>
                </select>

                <!--Language Select-->
                <select class="custom-select bg-transparent ts-text-small border-left border-right" id="language" name="language"  style="display:none">
                    <option value="1">EN</option>
                    <option value="2">FR</option>
                    <option value="3">DE</option>
                </select>

            </div>
            <!--end navbar-nav-->
        </div>
        <!--end container-->
    </nav>

    <!--PRIMARY NAVIGATION
    =============================================================================================================-->
    <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
        <div class="container">

            <!--Brand Logo-->
            {{--                    <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">--}}
            {{--                        <img src="assets/img/logo.png" alt="">--}}
            {{--                    </a>--}}

            <!--Responsive Collapse Button-->
            {{--                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--                        <span class="navbar-toggler-icon"></span>--}}
            {{--                    </button>--}}

            <!--Collapsing Navigation-->
            <div class="collapse navbar-collapse" id="navbarPrimary">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Bosh sahifa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about_us') }}">Loyiha haqida</a>
                    </li>
                    <!--end ABOUT US nav-item-->

                    <!--CONTACT (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="nav-link mr-2" href="{{ route('feedback') }}">Aloqa</a>
                    </li>
                    <!--end CONTACT nav-item-->

                </ul>
                <!--end Left navigation main level-->

                <!--RIGHT NAVIGATION MAIN LEVEL
                =================================================================================================-->
                <ul class="navbar-nav ml-auto" style="display:none">

                    <!--LOGIN (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>

                    <!--REGISTER (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="register.html">Register</a>
                    </li>

                    <!--SUBMIT (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm m-1 px-3" href="submit.html">
                            <i class="fa fa-plus small mr-2"></i>
                            Add Property
                        </a>
                    </li>

                </ul>
                <!--end Right navigation-->

            </div>
            <!--end navbar-collapse-->
        </div>
        <!--end container-->
    </nav>
</header>
