<div class="main-menu-area main-menu-fix-active main-menu-fixed">
        <div class="container">
            <div class="menu-logo">
                <div class="logo">
                    <a href="index.html" class="logo-index"><img class="main-logo" src="/images/logo.png" alt="" /></a>
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
                                <li><a href="{{ route('action.center') }}">All Actions taken</a></li>
                                @auth
                                    @hasStartedLevel(auth()->user()->level_number)
                                    <li><a href="{{ route('learders-board') }}">Learders Board</a></li>
                                    @endhasStartedLevel
                                @endauth
                            </ul>
                        </li>
                        @auth
                        @hasStartedLevel(auth()->user()->level_number)
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
                        <li class="dropdown dropdown-notifications">
                            <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                              <i data-count="0" class="glyphicon glyphicon-book notification-icon"></i>
                            </a>
                            <div class="dropdown-container">
                              <div class="dropdown-toolbar">
                                <div class="dropdown-toolbar-actions">
                                  <a href="#">Mark all as read</a>
                                </div>
                                <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                              </div>
                              <ul class="dropdown-menu">
                              </ul>
                              <div class="dropdown-footer text-center">
                                <a href="#">View All</a>
                              </div>
                            </div>
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
                       <span class="hidden-sm hidden-xs hidden-1200">{{ auth()->user()->name }}</span>
                    @endif
                    <a href="#" class="hidden-lg hidden-md" id="humbarger-icon"><i class="fa fa-bars"></i> </a>
               </div>
            </div>
        </div>
    </div>
