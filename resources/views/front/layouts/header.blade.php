    <?php //dd(auth()->user()); ?>
    <header class="" style="z-index: 0;">

        <div class="header-logo"> <a class="logo" href="#"><img alt="" src="{{asset('front/images/logo-01.png')}}"
                    width="80%"></a>
        </div> <a class="elemadded responsive-link" href="#">Menu</a>
        <div class="navbar-vertical">
            <ul class="main-menu">
            @if(auth()->user()->current_profile == '1')
                <li><a class="NavFont" href="{{route('home')}}"><span>Get Support</span></a>
                </li>
            @endif
            <!-- @if(\Request::segment(1) !== 'profile' && \Request::segment(1) !== 'home')
                <li><a class="NavFont" href="#"><span>Send me a Query</span></a>
                </li>
            @endif -->
                 <li><a class="NavFont" href="{{route('my.services')}}"><span>My Services</span></a>
                 <li><a class="NavFont" href="{{route('my.wallet')}}"><span>My Wallet</span></a>
                </li>
                <li><a class="NavFont" href="{{route('profile')}}"><span>My Profile</span></a>
                </li>

                <li><a class="NavFont" href="{{url('/messenger/t/'.\Auth::id())}}"><span>Inbox ()</span></a>
                </li>
                 <li><a class="NavFont" href="{{route('my.reviews')}}"><span>Reviews</span></a>
                </li>
                 <li><a class="NavFont" href="#"><span>Payments</span></a>
                </li>
                 <li><a class="NavFont" href="{{route('my.projects')}}"><span>Projects</span></a>
                </li>
                <li><a class="NavFont" href="{{route('logout')}}"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </header>