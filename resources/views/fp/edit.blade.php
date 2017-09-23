@extends('welcome')
@section('content')

<div class="row row-main">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12 m5 l5">
          <nav class="cyan nav-breadcrumb">
            <div class="nav-wrapper">
              <div class="col s12">
                <a href="{{ url('books') }}" class="breadcrumb">Mesin Absensi</a>
                <a href="{{ url('books/create') }}" class="breadcrumb">Ubah Mesin</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row margin-bottom">
        <div class="col s12 m12 l12">
          <h4>Ubah Mesin</h4>
        </div>
      </div>
      <div class="row">
        <form class="col s12" method="post" action="{{ route('fingerprint_update') }}">
          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{ $data->id }}">
          <div class="row margin-bottom">
            <div class="input-field col s12 m12 l12">
              <input id="ip" type="text" name="ip" value="{{ $data->ip }}">
              <label for="ip">IP Address Mesin</label>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="comkey" type="text" name="comkey" value="{{ $data->comkey }}">
              <label for="comkey">Com Key</label>
            </div>
            {{-- <div class="input-field col s12 m12 l12"> --}}
              {{-- <input id="port" type="text" name="port" value="{{ $data->port }}"> --}}
              {{-- <label for="port">Port</label> --}}
            {{-- </div> --}}
          </div>
          <div class="row right">
            <button class="btn waves-effect waves-light cyan" id="btn_create">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('asset_footer')
  <script>
  $(document).ready(function() {
    $('#comkey').mask('00000');
    $('#ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
  });
  </script>
@endsection
