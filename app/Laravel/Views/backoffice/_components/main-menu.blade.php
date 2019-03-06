<!-- main menu-->
<div id="main-menu" data-scroll-to-active="true" class="main-menu menu-dark menu-fixed menu-shadow menu-accordion">
  <!-- main menu header-->
  <div class="main-menu-header">
    <div class="user-panel">
      <div class="pull-center image">
        <span class="avatar avatar-online"><img src="/backoffice/robust-assets/images/portrait/small/avatar-s-1.png" alt="avatar" class="img-circle"></span>
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
      </div>
    </div>
    {{--<input type="text" placeholder="Search" class="menu-search form-control round"/>--}}
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      
      <li class="active"></li>
      <li class="nav-item"><a href="{{ route('backoffice.index') }}"><i class="icon-home3"></i><span data-i18n="nav.dashboard" class="menu-title">Dashboard</span></a></li>

      {{--<li class="navigation-header"><span data-i18n="nav.content">Marketing</span><i data-toggle="tooltip" data-placement="right" data-original-title="Marketing" class="icon-ellipsis icon-ellipsis"></i></li>

      <li class="nav-item" data-group="advertisement"><a href="#"><i class="icon-image2"></i><span data-i18n="nav.advertisement" class="menu-title">Advertisement</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.advertisement.index') }}" data-i18n="nav.advertisement.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.advertisement.create') }}" data-i18n="nav.advertisement.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.advertisement.trash') }}" data-i18n="nav.advertisement.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>--}}
       <li class="navigation-header"><span data-i18n="nav.content">Content Manager</span><i data-toggle="tooltip" data-placement="right" data-original-title="Content Manager" class="icon-ellipsis icon-ellipsis"></i></li>
      
      <li class="nav-item" data-group="advisory-notification"><a href="#"><i class="icon-bullhorn"></i><span data-i18n="nav.advisory" class="menu-title">Advisory</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.advisory.index') }}" data-i18n="nav.advisory.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.advisory.create') }}" data-i18n="nav.advisory.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.advisory.trash') }}" data-i18n="nav.advisory.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>
      {{--
      <li class="nav-item" data-group="image-asset"><a href="#"><i class="icon-image2"></i><span data-i18n="nav.image_asset" class="menu-title">Image Asset</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.image_asset.index') }}" data-i18n="nav.image_asset.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.image_asset.create') }}" data-i18n="nav.image_asset.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.image_asset.trash') }}" data-i18n="nav.image_asset.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="partner"><a href="#"><i class="icon-user-tie"></i><span data-i18n="nav.partner" class="menu-title">Partners</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.partner.index') }}" data-i18n="nav.partner.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.partner.create') }}" data-i18n="nav.partner.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.partner.trash') }}" data-i18n="nav.partner.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="product"><a href="#"><i class="icon-lab"></i><span data-i18n="nav.product" class="menu-title">Products</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.product.index') }}" data-i18n="nav.product.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.product.create') }}" data-i18n="nav.product.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.product.trash') }}" data-i18n="nav.product.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="solution"><a href="#"><i class="icon-clipboard2"></i><span data-i18n="nav.solution" class="menu-title">Solutions</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.solution.index') }}" data-i18n="nav.solution.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.solution.create') }}" data-i18n="nav.solution.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.solution.trash') }}" data-i18n="nav.solution.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="team"><a href="#"><i class="icon-users"></i><span data-i18n="nav.team" class="menu-title">Team</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.team.index') }}" data-i18n="nav.team.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.team.create') }}" data-i18n="nav.team.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.team.trash') }}" data-i18n="nav.team.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="page"><a href="#"><i class="icon-file"></i><span data-i18n="nav.page" class="menu-title">Pages</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.page.index') }}" data-i18n="nav.page.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.page.create') }}" data-i18n="nav.page.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.page.trash') }}" data-i18n="nav.page.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="blog"><a href="#"><i class="icon-blog"></i><span data-i18n="nav.blog" class="menu-title">Blogs</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.blog.index') }}" data-i18n="nav.blog.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.blog.create') }}" data-i18n="nav.blog.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.blog.trash') }}" data-i18n="nav.blog.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="general-setting"><a href="#"><i class="icon-wrench"></i><span data-i18n="nav.blog" class="menu-title">General Settings</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.general_setting.index') }}" data-i18n="nav.general_setting.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.general_setting.create') }}" data-i18n="nav.general_setting.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.general_setting.trash') }}" data-i18n="nav.general_setting.trash" class="menu-item">Trash</a></li>
        </ul>
      </li> --}}

      <li class="navigation-header"><span data-i18n="nav.content">User Manager</span><i data-toggle="tooltip" data-placement="right" data-original-title="User Manager" class="icon-ellipsis icon-ellipsis"></i></li>
      
      <li class="nav-item" data-group="user"><a href="#"><i class="icon-user"></i><span data-i18n="nav.user" class="menu-title">Users</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.user.index') }}" data-i18n="nav.user.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.user.create') }}" data-i18n="nav.user.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.user.trash') }}" data-i18n="nav.user.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="{{ route('backoffice.report.index') }}"><i class="icon-notification"></i><span data-i18n="nav.report" class="menu-title">Reports</span></a></li>


      <li class="navigation-header"><span data-i18n="nav.content">App Settings</span><i data-toggle="tooltip" data-placement="right" data-original-title="App Settings" class="icon-ellipsis icon-ellipsis"></i></li>

      {{--<li class="nav-item" data-group="activities"><a href="#"><i class="icon-pen3"></i><span data-i18n="nav.station" class="menu-title">Farm Activities</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.activity.index') }}" data-i18n="nav.activity.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.activity.create') }}" data-i18n="nav.activity.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.activity.trash') }}" data-i18n="nav.activity.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>--}}
  
      <li class="nav-item" data-group="stations"><a href="#"><i class="icon-location3"></i><span data-i18n="nav.station" class="menu-title">Stations</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.station.index') }}" data-i18n="nav.station.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.station.map') }}" data-i18n="nav.station.map" class="menu-item">Map View</a></li>

          <li class=""><a href="{{ route('backoffice.station.create') }}" data-i18n="nav.station.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.station.trash') }}" data-i18n="nav.station.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="crops"><a href="#"><i class="icon-data"></i><span data-i18n="nav.crop" class="menu-title">Crops</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.crop.index') }}" data-i18n="nav.crop.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.crop.create') }}" data-i18n="nav.crop.create" class="menu-item">Create New</a></li>
          {{-- <li class=""><a href="{{ route('backoffice.registrant.trash') }}" data-i18n="nav.registrant.trash" class="menu-item">Trash</a></li> --}}
        </ul>
      </li>

      <li class="nav-item" data-group="registrants"><a href="#"><i class="icon-data"></i><span data-i18n="nav.registrant" class="menu-title">Contact Registrants</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.registrant.index') }}" data-i18n="nav.registrant.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.registrant.create') }}" data-i18n="nav.registrant.create" class="menu-item">Create New</a></li>
          {{-- <li class=""><a href="{{ route('backoffice.registrant.trash') }}" data-i18n="nav.registrant.trash" class="menu-item">Trash</a></li> --}}
        </ul>
      </li>

      {{-- <li class="nav-item" data-group="recommendations"><a href="#"><i class="icon-sun"></i><span data-i18n="nav.recommendation" class="menu-title">Recommendations</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.recommendation.index') }}" data-i18n="nav.recommendation.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.recommendation.create') }}" data-i18n="nav.recommendation.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.recommendation.trash') }}" data-i18n="nav.recommendation.trash" class="menu-item">Trash</a></li>
        </ul>
      </li>

      <li class="nav-item" data-group="responses"><a href="#"><i class="icon-megaphone"></i><span data-i18n="nav.response_message" class="menu-title">Responses</span></a>
        <ul class="menu-content">
          <li class=""><a href="{{ route('backoffice.response_message.index') }}" data-i18n="nav.response_message.all" class="menu-item">Record Data</a></li>
          <li class=""><a href="{{ route('backoffice.response_message.create') }}" data-i18n="nav.response_message.create" class="menu-item">Create New</a></li>
          <li class=""><a href="{{ route('backoffice.response_message.trash') }}" data-i18n="nav.response_message.trash" class="menu-item">Trash</a></li>
        </ul>
      </li> --}}

      {{--   --}}

    </ul>
  </div>
  <!-- /main menu content-->
</div>
<!-- / main menu-->