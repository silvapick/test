<!DOCTYPE html>
    <html lang="{{ config('app.locale') }}">

    @include('layout.head')

    <body>

        @include('layout.nav')

            <div class="container-fluid">

                @yield('content')

            </div>

            @include('layout.scripts')

    </body>
</html>
