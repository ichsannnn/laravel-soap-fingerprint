<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/product-sans.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/icon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom-style.css') }}">
  </head>
  <body class="grey lighten-3">
    @include('templates.navbar')
    @include('templates.sidenav')
    <main>
      @yield('content')
    </main>
  </body>
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('assets/js/materialize.min.js') }}"></script>
  <script src="{{ url('assets/plugins/jquery-mask/jquery.mask.min.js') }}"></script>
  <script src="{{ url('assets/js/init.js') }}"></script>
  @yield('asset_footer')
</html>
