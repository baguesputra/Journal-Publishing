<div class="sidebar" data-color="black" data-active-color="primary">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('img/logo2.png')}}">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ Auth::user()->name }}
        </a>
       
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{route('admin')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'affiliation' || $elementActive == 'author' || $elementActive == 'editorial' || $elementActive == 'reviewer' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>
                            {{ __('Master Data') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'affiliation' ? 'active' : '' }}">
                            <a href="{{ route('affiliation.index')}}">
                                <span class="sidebar-mini-icon">{{ __('AF') }}</span>
                                <span class="sidebar-normal">{{ __(' Affiliation ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'author' ? 'active' : '' }}">
                            <a href="{{ route('author.index')}}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Author ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'editorial' ? 'active' : '' }}">
                            <a href="{{ route('editorial.index')}}">
                                <span class="sidebar-mini-icon">{{ __('ED') }}</span>
                                <span class="sidebar-normal">{{ __(' Editorial ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'reviewer' ? 'active' : '' }}">
                            <a href="{{ route('reviewer.index')}}">
                                <span class="sidebar-mini-icon">{{ __('RE') }}</span>
                                <span class="sidebar-normal">{{ __(' Reviewer ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                <a href="{{ route('user.index')}}">
                    <i class="fa fa-user-o"></i>
                    <p>{{ __('User Management') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'position' || $elementActive == 'role' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#category">
                    <i class="nc-icon nc-app"></i>
                    <p>
                            {{ __('Category') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="category">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'position' ? 'active' : '' }}">
                            <a href="{{ route('position.index')}}">
                                <span class="sidebar-mini-icon">{{ __('AF') }}</span>
                                <span class="sidebar-normal">{{ __(' Position ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'role' ? 'active' : '' }}">
                            <a href="{{ route('role.index')}}">
                                <span class="sidebar-mini-icon">{{ __('R') }}</span>
                                <span class="sidebar-normal">{{ __(' Role ') }}</span>
                            </a>
                        </li>
                <li class="{{ $elementActive == 'feedback' ? 'active' : '' }}">
                    <a href="{{ route('contact.index')}}">
                        <i class="fa fa-commenting-o"></i>
                    <p>{{ __('Feedback') }}</p>
                </a>
            </li>
                
                    </ul>
                </div>
            </li>
            <!-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="" class="bg-danger">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
