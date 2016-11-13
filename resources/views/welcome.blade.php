<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AAS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}" media="screen" title="Materialize CSS" charset="utf-8">
    <link href="{{ url('assets/css/product-sans.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/puin.ico') }}">
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/materialize.min.js') }}"></script>
    <script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ url('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ url('assets/js/init.js') }}"></script>
  </head>
  <body class="grey lighten-4">
    @include('templates.navbar')
    @include('templates.sidenav')
  <main>
    @yield('content')
  </main>
  </body>
</html>
