<nav class="mobile-background-nav">
    <div class="mobile-nav-image">
            <img class="nav-bg" src="{{asset('images/nav-img.jpg')}}">
            @guest
            <div class="nav-image-guest">
                <div class="image_outer_container">
                    <div class="image_inner_container-nav">
                        <img class="nav-img"
                            src="{{ asset('images/logo.png') }}">
                    </div>
                </div>
            </div>
            <div class="nav-username">Welcome to female and more</div>
            @endguest
             @auth
            <div class="nav-image">
            <div class="image_outer_container">
                <div class="image_inner_container-nav">
                    <img class="nav-img"
                        src="{{ asset(auth()->user()->image) }}">
                </div>
            </div>
        </div>
        <div class="nav-username">{{ auth()->user()->name }}</div>
        <div class="nav-email">{{ auth()->user()->email }}</div>
        <div style="font-size: 13px; position: absolute; top: 150px; left: 5px;" class="text-muted"> joined {{ auth()->user()->created_at->diffForHumans() }}</div>
        @endauth
       </div> 
    <div class="mobile-inner">
       
        <span class="mobile-menu-close"><i class="icon-icomooon-close"></i></span>
        <ul class="menu-accordion">
            
            @auth 
            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
             @endauth
            <li><a href="{{ route('fam') }}">Home</a></li>
            <li><a href="events.html" class="has-submenu">Events<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="events.html">Events</a></li>
                    <li><a href="event-details.html">Event Details</a></li>
                </ul>
            </li>
            <li><a href="blog.html" class="has-submenu">Blog<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="causes.html" class="has-submenu">Causes<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="causes.html">Causes</a></li>
                    <li><a href="causes-details.html">Causes Details</a></li>
                </ul>
            </li>
            @guest
            <li><a href="{{ route('login') }}" class="has-submenu">Account<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </li>
            @endguest
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contact-us.html">Contact</a></li>
        </ul>
    </div>
</nav>