<!DOCTYPE html>
<html lang="en">

<head>
  <title>KS Metals Mining</title>
  <meta charset="UTF-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  {{-- <link rel="shortcut icon" href={{asset('assets/frontend/images/favicon.png')}} type="image/x-icon"> --}}
  @yield('css')
  @include('frontend.layouts.header-css')
  @toastr_css
</head>

<body>
  @include('frontend.layouts.header')

  @yield('section')

  
  @include('frontend.layouts.footer')
  @include('frontend.layouts.footer-js')
  @yield('js')
  @yield('script')
  @toastr_js
  @toastr_render
</body>

</html>