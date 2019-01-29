<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
  
  <head>
    @include('backoffice._includes.metas')
    <title>{{ config('app.name') . ( isset($page_title) ? " - {$page_title}" : NULL ) }}</title>
    @include('backoffice._includes.favicon')
    @include('backoffice._includes.styles')
    @yield('page-styles')
  </head>

  <body 
    data-open="click" 
    data-menu="vertical-menu" 
    data-col="2-columns" 
    class="vertical-layout vertical-menu 2-columns  fixed-navbar"
    >
    
    @if(Route::currentRouteName() == "backoffice.index")
    @include('backoffice._components.preloader')
    @endif
    @include('backoffice._components.nav')
    @include('backoffice._components.main-menu')
    @yield('content')
    @yield('page-modals')
    @include('backoffice._components.footer')
    @include('backoffice._includes.scripts')
    @include('backoffice._components.toastr')
    @yield('page-scripts')

  </body>

</html>