<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Not Found - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/icon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/404.css') }}">
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/materialize.min.js') }}"></script>
  </head>
  <body class="grey lighten-4">
    <div class="row">
      <div class="col s12">
        <div id="error-page" class="error-page center">
          <div class="error-text">
            4<i class="material-icons cyan-text icon-notfound">location_off</i>4
          </div>
            <div class="error-text-form">
              <div class="row">
                <div class="col s12">
                  <div class="error-text-2">
                    Halaman yang anda cari tidak tersedia. Gunakan menu navigasi untuk menemukan apa yang anda cari.
                  </div>
                  <div class="button-notfound">
                    <a href="{!! URL::previous() !!}" class="btn cyan waves-effect waves-light inline-block">Kembali</a>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    </div>
  </body>
</html>
