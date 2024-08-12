<div class="wrapper">

    @include('layouts_editorial.navbars.auth')

    <div class="main-panel">
        @include('layouts_editorial.navbars.navs.auth')
        @yield('content')
        @include('layouts_editorial.footer')
    </div>
</div>