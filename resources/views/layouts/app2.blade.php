<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
        @yield('styles')
    </head>
    <body>
        <div>
            <header class="header_section">
                @include('includes.header2')
            </header>
            <div id="main">
                @yield('content')
            </div>
        </div>
        @include('includes.footer2')
        @yield('scripts')
        <script>
            $("#alert").fadeTo(2000, 1000).slideUp(1000, function(){$("#alert").slideUp(1000);});
        </script>
    </body>
</html>