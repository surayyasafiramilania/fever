<div class="header-content clearfix">

    <div class="nav-control">
        <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
        </div>
    </div>
    <div class="header-right">
        <ul class="clearfix">
            <li class="icons dropdown">
                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                    <span class="activity active"></span>
                    <img src="{{asset('template/images/user/1.png')}}" height="40" width="40" alt="">
                </div>
                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="{{url('tentang-aplikasi')}}"><i class="icon-info"></i> <span>Tentang Aplikasi</span></a>
                            </li>
                            <hr class="my-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i><span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>