<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	@include('layout.header')

	@include('layout.navi_bar')

    @yield('body')
    
    @include('layout.footer')
</html>
