<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>ExpressData - Mobile Data </title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="/theme/manifest.json" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/ZXCZvxb,theme/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="/theme/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/theme/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="/theme/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/theme/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
    <!-- screen loader -->
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 mb-4 rounded-circle">
                        <img src="/theme/img/favicon144.png" alt="" class="w-100">
                    </div>
                    <h4 class="text-default">ExpressData</h4>
                    <p class="text-secondary">Cheap and lasting..</p>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- menu main -->
    @include('layout.sidebar.index')
    <div class="backdrop"></div>
    

    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link" type="button">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">ExpressData</h5>
                    </a>
                </div>
                <div class="ml-auto col-auto pl-0">
                    {{-- <button type="button" class="btn btn-link btn-40 colorsettings">
                        <span class="material-icons">color_lens</span>
                    </button> --}}

                    {{-- <a href="https://google.com" class="menu-btn btn btn-40 btn-link" >
                        <span class="material-icons">notifications_none</span>
                        <span class="counter"></span>
                    </a> --}}
                    <a href="profile.html" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
                        <figure class="m-0 background">
                            <img src="/default.png" alt="">
                        </figure>
                    </a>
                </div>
            </div>
        </header>

       @yield('content')
    </main>

    <!-- footer-->
    @include('layout.footer')

    <!-- color settings style switcher -->
    <div class="color-picker">
        <div class="row">
            <div class="col text-left">
                <div class="selectoption">
                    <input type="checkbox" id="darklayout" name="darkmode">
                    <label for="darklayout">Dark</label>
                </div>
                <div class="selectoption mb-0">
                    <input type="checkbox" id="rtllayout" name="layoutrtl">
                    <label for="rtllayout">RTL</label>
                </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-link text-secondary btn-round colorsettings2"><span class="material-icons">close</span></button>
            </div>
        </div>

        <hr class="mt-2">
        <div class="colorselect">
            <input type="radio" id="templatecolor1" name="sidebarcolorselect">
            <label for="templatecolor1" class="bg-dark-blue" data-title="dark-blue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor2" name="sidebarcolorselect">
            <label for="templatecolor2" class="bg-dark-purple" data-title="dark-purple"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor4" name="sidebarcolorselect">
            <label for="templatecolor4" class="bg-dark-gray" data-title="dark-gray"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor6" name="sidebarcolorselect">
            <label for="templatecolor6" class="bg-dark-brown" data-title="dark-brown"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor3" name="sidebarcolorselect">
            <label for="templatecolor3" class="bg-maroon" data-title="maroon"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor5" name="sidebarcolorselect">
            <label for="templatecolor5" class="bg-dark-pink" data-title="dark-pink"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor8" name="sidebarcolorselect">
            <label for="templatecolor8" class="bg-red" data-title="red"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor13" name="sidebarcolorselect">
            <label for="templatecolor13" class="bg-amber" data-title="amber"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor7" name="sidebarcolorselect">
            <label for="templatecolor7" class="bg-dark-green" data-title="dark-green"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor11" name="sidebarcolorselect">
            <label for="templatecolor11" class="bg-teal" data-title="teal"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor12" name="sidebarcolorselect">
            <label for="templatecolor12" class="bg-skyblue" data-title="skyblue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor10" name="sidebarcolorselect">
            <label for="templatecolor10" class="bg-blue" data-title="blue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor9" name="sidebarcolorselect">
            <label for="templatecolor9" class="bg-purple" data-title="purple"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor14" name="sidebarcolorselect">
            <label for="templatecolor14" class="bg-gray" data-title="gray"></label>
        </div>
    </div>




    <!-- Required jquery and libraries -->
    <script src="/theme/js/jquery-3.3.1.min.js"></script>
    <script src="/theme/js/popper.min.js"></script>
    <script src="/theme/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="/theme/js/jquery.cookie.js"></script>

    <!-- Swiper slider  js-->
    <script src="/theme/vendor/swiper/js/swiper.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="/theme/js/main.js"></script>
    <script src="/theme/js/color-scheme-demo.js"></script>

    <!-- PWA app service registration and works -->
    <script src="/theme/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="/theme/js/app.js"></script>
    @yield('js')
</body>

</html>
