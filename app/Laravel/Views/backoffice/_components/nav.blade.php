<a href="/" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><img src="/dist/img/icon-logo.png"/></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"> <img src="/dist/img/in-logo.png"/> </span>
</a>
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="search-input">
    <i class="fa fa-search"> </i>
  </div>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <li class="date">
          <h4>Tuesday, 12 February 2019 15:05</h4>
      </li>
      <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/dist/img/message.png">
          <span class="label label-danger">4</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have 4 messages</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li><!-- start message -->
                <a href="#">
                  <div class="pull-left">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                    Support Team
                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li>
              <!-- end message -->
              <li>
                <a href="#">
                  <div class="pull-left">
                    <img src="/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                      Design Team
                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="pull-left">
                    <img src="/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                    Developers
                    <small><i class="fa fa-clock-o"></i> Today</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="pull-left">
                    <img src="/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                    Sales Department
                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="pull-left">
                    <img src="/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                    Reviewers
                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
      </li>
      <!-- Notifications: style can be found in dropdown.less -->
      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/dist/img/bell.png">
          <span class="label label-danger">10</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have 10 notifications</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                  page and may cause design problems
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-users text-red"></i> 5 new members joined
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-user text-red"></i> You changed your username
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
      </li>

      
      <!-- Tasks: style can be found in dropdown.less -->
    
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->
        
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{ route('backoffice.profile.index') }}" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ route('backoffice.auth.logout') }}" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->

      <li class="flag">
        <img src="/dist/img/flag.png">
      </li>
      
    </ul>
  </div>
</nav>

{{-- <div id="fullscreen-search" class="fullscreen-search">
  <form class="fullscreen-search-form">
    <input type="search" placeholder="Search..." class="fullscreen-search-input">
    <button type="submit" class="fullscreen-search-submit">Search</button>
  </form>
  <div class="fullscreen-search-content">
    <div class="fullscreen-search-options">
      <div class="row">
        <div class="col-sm-12">
          <fieldset>
            <label class="custom-control custom-checkbox display-inline">
              <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">All</span>
            </label>
            <label class="custom-control custom-checkbox display-inline">
              <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">People</span>
            </label>
            <label class="custom-control custom-checkbox display-inline">
              <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">Project</span>
            </label>
            <label class="custom-control custom-checkbox display-inline">
              <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">Task</span>
            </label>
          </fieldset>
        </div>
      </div>
    </div>
    <div class="fullscreen-search-result mt-2">
      <div class="row">
        <div class="col-lg-4">
          <h3>People</h3>
          <div class="media"><a href="#" class="media-left"><img src="/backoffice/robust-assets/images/portrait/small/avatar-s-2.png" alt="Generic placeholder image" class="media-object rounded-circle"></a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Karmen Dartez</a></h5>
              <p class="mb-0"><span class="tag tag-pill mr-1 tag-danger">JavaScript</span><span class="tag tag-pill mr-1 tag-primary">HTML</span></p>
              <p><span class="font-weight-bold">Sr. Developer - </span><a href="mailto:john@example.com">karmen@example.com</a></p>
            </div>
          </div>
          <div class="media"><a href="#" class="media-left"><img src="/backoffice/robust-assets/images/portrait/small/avatar-s-3.png" alt="Generic placeholder image" class="media-object rounded-circle"></a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Scot Loh</a></h5>
              <p class="mb-0"><span class="tag tag-pill mr-1 tag-danger">PhotoShop</span><span class="tag tag-pill mr-1 tag-warning">UX</span></p>
              <p><span class="font-weight-bold">Sr. UI/UX Desugner - </span><a href="mailto:john@example.com">scot@example.com</a></p>
            </div>
          </div>
          <div class="media"><a href="#" class="media-left"><img src="/backoffice/robust-assets/images/portrait/small/avatar-s-5.png" alt="Generic placeholder image" class="media-object rounded-circle"></a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Kim Willmore</a></h5>
              <p class="mb-0"><span class="tag tag-pill mr-1 tag-warning">CSS</span><span class="tag tag-pill mr-1 tag-danger">HTML</span></p>
              <p><span class="font-weight-bold">UI Developer - </span><a href="mailto:john@example.com">kim@example.com</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <h3>Project</h3>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">WordPress Template Support</a></h5>
              <progress value="25" max="100" class="progress progress-xs progress-success mb-0">25%</progress>
              <p class="mb-0">Collicitudin vel metus scelerisque ante  commodo.</p>
              <p><span class="tag tag-pill tag-success">In Progress</span><span class="tag tag-default tag-default float-sm-right">25% Completed</span></p>
            </div>
          </div>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Application UI/UX</a></h5>
              <progress value="100" max="100" class="progress progress-xs progress-info mb-0">100%</progress>
              <p class="mb-0">Cetus scelerisque ante sollicitudin commodo.</p>
              <p><span class="tag tag-pill tag-info">Completed</span><span class="tag tag-default tag-default float-sm-right">100% Completed</span></p>
            </div>
          </div>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">SEO Project</a></h5>
              <progress value="65" max="100" class="progress progress-xs progress-warning mb-0">65%</progress>
              <p class="mb-0">Notifications scelerisque ante sollicitudin commodo.</p>
              <p><span class="tag tag-pill tag-warning">Delayed</span><span class="tag tag-default tag-default float-sm-right">65% Completed</span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <h3>Task</h3>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Create the new layout for menu</a></h5>
              <p class="mb-0">Pcelerisque ulla vel metus  ante sollicitudin commodo.</p>
              <p><span class="tag tag-pill tag-danger">Open</span><span class="tag tag-default tag-default tag-default tag-icon float-sm-right"><i class="icon-calendar5"></i> 22 January, 16</span></p>
            </div>
          </div>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Addition features on footer</a></h5>
              <p class="mb-0">Tuaiulla vel metus scelerisque ante sollicitudin commodo.</p>
              <p><span class="tag tag-pill tag-warning">On hold</span><span class="tag tag-default tag-default tag-default tag-icon float-sm-right"><i class="icon-calendar5"></i> 24 January, 16</span></p>
            </div>
          </div>
          <div class="media">
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Remove TODO comments</a></h5>
              <p class="mb-0">Mulullametu vel  scelerisque ante sollicitudin commodo.</p>
              <p><span class="tag tag-pill tag-info">Resolved</span><span class="tag tag-default tag-default tag-default tag-icon float-sm-right"><i class="icon-calendar5"></i> 25 January, 16</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><span class="fullscreen-search-close"></span>
</div>
<div class="fullscreen-search-overlay"></div> --}}