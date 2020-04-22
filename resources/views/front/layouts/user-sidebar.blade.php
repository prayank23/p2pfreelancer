
    <header class="clearfix" style="z-index: 0;">

        <div class="header-logo"> <a class="logo" href="#"><img alt="" src="{{asset('front/images/logo-01.png')}}"
                    width="80%"></a>
        </div> <a class="elemadded responsive-link" href="#">Menu</a>
        <div class="navbar-vertical">
            <ul class="main-menu">
                 <li><a class="NavFont" href="{{route('user.mianprofile',['user'=>\Request::segment(3)])}}"><span>Services</span></a>
                </li>
                 <li><a class="NavFont" href="{{route('user.reviews',['user'=>\Request::segment(3)])}}"><span>Reviews</span></a>
                </li>
                <li><a class="NavFont" data-toggle="modal" data-target="#myModal" href="#"><span>Send me a Query</span></a>
                </li>
                
                 <li><a class="NavFont" href="#"><span>Go Back</span></a>
                </li>
                <li><a class="NavFont" href="{{route('logout')}}"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </header>