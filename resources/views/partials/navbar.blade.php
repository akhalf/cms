<a class="navbar-brand text-light" href="{{ url('/') }}" >
    {{ config('app.name', 'CMS') }}
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse navbar-dark" id="navbarSupportedContent">
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;{{__('navbar.Home')}}</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-file"></i>{{__('navbar.Pages')}}
            </a>
            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">page name</a>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav">
        @auth
            <li class="nav-item ml-3">
                <a class="nav-link" href=""><i class="fa fa-plus fa-fw"></i>{{ __('navbar.NewPost') }}</a>
            </li>
        @endauth
    <!-- Search Box -->
        <li class="nav-item ml-3">
            <form method="post" action="">
                @csrf
                <div class="input-group col-sm-12 mt-1">
                    <input type="text" class="form-control form-control-sm" name="keyword" placeholder="{{ __('navbar.Search') }}"/>
                    <button class="btn btn-sm btn-outline-white" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </li>

        <!-- Authentication Links -->
        @guest
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('login') }}">{{ __('navbar.Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('navbar.Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="" alt="Avatar" class="avatar">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right  text-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=""><i class="fas fa-cog fa-fw"></i>لوحة التحكم</a>
                    <a class="dropdown-item" href=""><i class="far fa-user fa-fw"></i>{{__('navbar.Profile')}}</a>
                    <a class="dropdown-item" href=""><i class="fas fa-cog fa-fw"></i>{{__('navbar.Settings')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""
                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt fa-fw"></i>
                        {{ __('navbar.Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
