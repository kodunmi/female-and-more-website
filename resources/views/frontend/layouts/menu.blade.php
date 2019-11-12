<div class="main-menu-area">
        <div class="container">
            <div class="menu-logo">
                <div class="logo">
                    <a href="index.html" class="logo-index"><img class="main-logo" src="images/logo.png" alt="" /></a>
                </div>
                <nav id="easy-menu">
                    <ul class="menu-list">
                        <li><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('fam') }}" data-turbolinks-action="replace">Home One</a></li>
                                <li><a href="index-two.html">Home Two</a></li>
                            </ul>
                        </li>
                        <li><a href="events.html">Events <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="events.html">Events</a></li>
                                <li><a href="event-details.html">Event Details</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
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
                   </ul>
               </nav><!--#easy-menu-->
               <div class="donate-button-wrap">
                   <a href="donate.html" class="btn base-bg hidden-xs hidden-sm">Account</a>
                   <a href="#" class="hidden-lg hidden-md" id="humbarger-icon"><i class="fa fa-bars"></i> </a>
               </div>
            </div>
        </div>
    </div>