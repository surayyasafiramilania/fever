<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <!--Preloader start-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--Preloader end-->

    <!--Main wrapper start-->
    <div id="main-wrapper">
        <!--Nav header start-->
        <div class="nav-header">
            @include('partials.nav-header')
        </div>
        <!--Nav header end-->

        <!--Header start-->
        <div class="header">
            @include('partials.header')
        </div>
        <!-- Header end ti-comment-alt-->

        <!--Sidebar start-->
        <div class="nk-sidebar">
            @include('partials.sidebar')
        </div>
        <!--Sidebar end-->

        <!--Content body start-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--Content body end-->

        <!--Footer start-->
        <div class="footer">
            @include('partials.footer')
        </div>
        <!--Footer end-->
    </div>
    <!--Main wrapper end-->

    <!--Scripts-->
        @include('partials.script')
    <!--Script end-->
</body>

</html>
