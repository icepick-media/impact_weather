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
    data-col="1-column" 
    class="vertical-layout vertical-menu 1-column  blank-page blank-page"
    >

    @include('backoffice._components.preloader')
    @yield('content')

    @include('backoffice._includes.scripts')
    @yield('page-scripts')
  </body>

</html>