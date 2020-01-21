<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(auth()->user()->image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{Route::currentRouteName() == 'level.create' ? 'active':''||Route::currentRouteName() == 'level.index' ? 'active':''}}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Level</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Route::currentRouteName() == 'level.create' ? 'active': ''}}"><a href="{{ route('level.create')}}"><i class="fa fa-circle-o"></i> Add Level</a></li>
                    <li class="{{Route::currentRouteName() == 'level.index' ? 'active': ''}}"><a href="{{ route('level.index')}}"><i class="fa fa-circle-o"></i> View Level</a></li>
                </ul>
            </li>
            <li class="treeview {{Route::currentRouteName() == 'story.create' ? 'active':''||Route::currentRouteName() == 'story.index' ? 'active':''}}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Stories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Route::currentRouteName() == 'story.create' ? 'active': ''}}"><a href="{{ route('story.create') }}"><i class="fa fa-circle-o"></i> Add Story</a></li>
                    <li class="{{Route::currentRouteName() == 'story.index' ? 'active': ''}}"><a href="{{ route('story.index') }}"><i class="fa fa-circle-o"></i> View Stories</a></li>
                </ul>
            </li>
            <li class="treeview {{Route::currentRouteName() == 'story.create' ? 'active':''||Route::currentRouteName() == 'story.index' ? 'active':''}}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Quote</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Route::currentRouteName() == 'quote.create' ? 'active': ''}}"><a href="{{ route('quote.create') }}"><i class="fa fa-circle-o"></i> Add quote</a></li>
                    <li class="{{Route::currentRouteName() == 'quote.index' ? 'active': ''}}"><a href="{{ route('quote.index') }}"><i class="fa fa-circle-o"></i> View Quotes</a></li>
                </ul>
            </li>
            <li class="{{Route::currentRouteName() == 'all-users' ? 'active':''}}">
                <a href="{{ route('all-users') }}">
                    <i class="fa fa-dashboard"></i> <span>All Users</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
