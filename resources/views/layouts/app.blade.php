
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    @include('layouts.header')
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        @include('layouts.navigation')
        <!--Container-->
        <div class="container w-full mx-auto pt-20">
            @yield('page-body')
        </div>
        <!--/container-->
        @include('layouts.footer')
    </body>
</html>