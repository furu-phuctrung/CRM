<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  >
  @include('head.head')
  <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default" style="font-family: initial;" >
    <div class="m-grid m-grid--hor m-grid--root m-page">
      @include('header.header')
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        @include('leftmenu.leftmenu')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
          @yield('content')
        </div>
      </div>
      @include('footer.footer')
    </div>
    @include('quicksidebar.quicksidebar')
    @include('javascript.javascript')
    @stack('scripts')
	</body>
</html>
