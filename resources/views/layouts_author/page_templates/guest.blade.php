@include('layouts_author.navbars.navs.guest')

<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset('paper') . '/' . ($backgroundImagePath ?? "img/bg/fabio-mangione.jpg") }}">
        @yield('content')
        @include('layouts_author.footer')
    </div>
</div>
