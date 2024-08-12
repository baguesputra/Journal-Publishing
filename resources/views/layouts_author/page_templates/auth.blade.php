<div class="wrapper">

    @include('layouts_author.navbars.auth')

    <div class="main-panel">
        @include('layouts_author.navbars.navs.auth')
        @yield('content')
        @include('layouts_author.footer')
    </div>
</div>