<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p>{{ Auth::user()->name }}</p>
          
        </div>
      </div>
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active">
          <a href="{{ route('backoffice.index') }}">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Advisory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backoffice.advisory.index') }}"><i class="fa fa-plus-square-o"></i> Record Data</a></li>
            <li><a href="{{ route('backoffice.advisory.create') }}"><i class="fa fa-pencil-square-o"></i> Create New</a></li>
            <li><a href="{{ route('backoffice.advisory.trash') }}"><i class="fa fa-trash-o"></i> Trash</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Work Planner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Planner 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Planner 2</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Planner 3</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Harvesting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Harvesting 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Harvesting 2</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Harvesting 3</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Nutrient Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 2</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-search"></i> <span>Pest & Disease</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 2</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backoffice.user.index') }}"><i class="fa fa-plus-square-o"></i> Record Data</a></li>
            <li><a href="{{ route('backoffice.user.create') }}"><i class="fa fa-pencil-square-o"></i> Create New</a></li>
            <li><a href="{{ route('backoffice.user.trash') }}"><i class="fa fa-trash-o"></i> Trash</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i> <span>Stations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backoffice.station.index') }}"><i class="fa fa-plus-square-o"></i> Record Data</a></li>
            <li><a href="{{ route('backoffice.station.map') }}"><i class="fa fa-map"></i> Map View</a></li>
            <li><a href="{{ route('backoffice.station.create') }}"><i class="fa fa-pencil-square-o"></i> Create New</a></li>
            <li><a href="{{ route('backoffice.station.trash') }}"><i class="fa fa-trash-o"></i> Trash</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-leaf"></i> <span>Crops</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backoffice.crop.index') }}"><i class="fa fa-plus-square-o"></i> Record Data</a></li>
            <li><a href="{{ route('backoffice.crop.create') }}"><i class="fa fa-pencil-square-o"></i> Create New</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-book"></i> <span>Contact Registrants</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backoffice.registrant.index') }}"><i class="fa fa-plus-square-o"></i> Record Data</a></li>
            <li><a href="{{ route('backoffice.registrant.create') }}"><i class="fa fa-pencil-square-o"></i> Create New</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cloud"></i> <span>Forecasts & Alerts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Weather</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Forecasts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Alert Triggers</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Row Data</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Worker Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 2</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 3</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Management 4</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{ route('backoffice.report.index') }}">
            <i class="fa fa-exclamation-circle"></i> <span> Reports </span>
          </a>
          
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments"></i> <span> FAQ/Help </span>
          </a>
          
        </li>
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>