<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="/admin/images/profile/{{auth()->user()->image}}" class="img-circle" alt="User Image">
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
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{Route::currentRouteName() == 'view-cat' ? 'active':''||Route::currentRouteName() == 'add-cat' ? 'active':''}}" >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{Route::currentRouteName() == 'add-cat' ? 'active': ''}}"><a href="{{url('/admin/add-category')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
          <li class="{{Route::currentRouteName() == 'view-cat' ? 'active': ''}}"><a href="{{url('/admin/view-category')}}"><i class="fa fa-circle-o"></i> View Category</a></li>
          </ul>
        </li>
        <li class="treeview {{Route::currentRouteName() == 'view-tmp' ? 'active':''||Route::currentRouteName() == 'add-tmp' ? 'active':''}}" >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Template</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{Route::currentRouteName() == 'add-tmp' ? 'active': ''}}"><a href="{{url('/admin/add-template')}}"><i class="fa fa-circle-o"></i> Add Template</a></li>
          <li class="{{Route::currentRouteName() == 'view-tmp' ? 'active': ''}}"><a href="{{url('/admin/view-template')}}"><i class="fa fa-circle-o"></i> View Template</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>