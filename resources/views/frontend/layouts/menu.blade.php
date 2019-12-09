<div class="main-menu-area main-menu-fix-active main-menu-fixed">
        <div class="container">
            <div class="menu-logo">
                <div class="logo">
                    <a href="index.html" class="logo-index"><img class="main-logo" src="images/logo.png" alt="" /></a>
                </div>
                <nav id="easy-menu">
                    <ul class="menu-list">
                        <li><a href="{{ route('fam') }}" data-turbolinks-action="replace">Home</a></li>
                        <li><a href="{{ route('about') }}">About <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('about') }}">About FAM</a></li>
                                <li><a href="{{ route('how-to-participate') }}">How To Participate</a></li>
                                <li><a href="{{ route('how-to-start-a-chapter') }}">Start A Chapter</a></li>
                                <li><a href="">About The Dev</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('users') }}">Participants <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('users') }}">All Participants</a></li>
                                @auth
                                    @hasStartedLevel
                                    <li><a href="{{ route('learders-board') }}">Learders Board</a></li>
                                    @endhasStartedLevel
                                @endauth
                            </ul>
                        </li>
                        @auth
                        @hasStartedLevel
                        <li><a href="{{ route('stories',['id' => auth()->user()->level_number]) }}">Stories</a></li>
                        @endhasStartedLevel
                        @endauth
                        <li><a href="contact-us.html">Contact</a></li>

                        @if (Auth::check())
                        <li><a href="blog.html">My Account <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}">Account <i class="fa fa-angle-down"></i></a>
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
