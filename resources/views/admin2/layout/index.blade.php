<!doctype html>
<html class="no-js" lang="en">

<head>
@include('admin2.layout.appcomponent.css')

</head>

<body>

    @include('admin2.layout.appcomponent.sidebar')
    <!-- Start Welcome area -->
    @include('admin2.layout.appcomponent.header')
            <!-- Mobile Menu start -->
             @yield('content')


    @include('admin2.layout.appcomponent.footer')


    @include('admin2.layout.appcomponent.js')

</body>

</html>
