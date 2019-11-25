<div class="main-menu-area">
        <div class="container">
            <div class="menu-logo">
                <div class="logo">
                    <a href="index.html" class="logo-index"><img class="main-logo" src="images/logo.png" alt="" /></a>
                </div>
                <nav id="easy-menu">
                    <ul class="menu-list">
                        <li><a href="{{ route('fam') }}" data-turbolinks-action="replace">Home</a></li>
                        <li><a href="events.html">Events <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="events.html">Events</a></li>
                                <li><a href="event-details.html">Event Details</a></li>
                            </ul>
                        </li>
                        <li><a href="causes.html">Causes <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('stories') }}" data-turbolinks-action="replace">Stories</a></li>
                                <li><a href="causes-details.html">Causes Details</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                        
                        @if (Auth::check())
                        <li><a href="blog.html">My Account <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li> 
                        @else
                            <li><a href="blog.html">Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li> 
                        @endif
                        
                        
                   </ul>
               </nav><!--#easy-menu-->
               <div class="donate-button-wrap">

                   @if (Auth::check())
                       <span class="hidden-sm hidden-xs">{{ auth()->user()->name }}</span>
                    @endif
                    <a href="#" class="hidden-lg hidden-md" id="humbarger-icon"><i class="fa fa-bars"></i> </a>
               </div>
            </div>
        </div>
    </div>