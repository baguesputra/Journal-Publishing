<div class="wrapper">

    @include('layouts_reviewer.navbars.auth')

    <div class="main-panel">
        @include('layouts_reviewer.navbars.navs.auth')
        @yield('content')
        @include('layouts_reviewer.footer')
    </div>
</div>