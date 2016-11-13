@extends('welcome')
@section('content')

<div class="row row-main">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12 m4 l4">
          <nav class="blue accent-2 nav-breadcrumb">
            <div class="nav-wrapper">
              <div class="col s12">
                <a href="{{ url('books') }}" class="breadcrumb">Fingerprint</a>
                <a href="{{ url('books/create') }}" class="breadcrumb">Tambah Mesin</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row margin-bottom">
        <div class="col s12 m12 l12">
          <h4>Tambah Mesin</h4>
        </div>
      </div>
      <div class="row">
        <form class="col s12" id="create_form" method="post" action="{{ url('setting/fingerprint') }}">
          {!! csrf_field() !!}
          <div class="row margin-bottom">
            <div class="input-field col s12 m6 l6">
              <input id="ip" type="text" name="machine_ip">
              <label for="ip">IP Mesin</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input id="tanggal_masuk" type="text" name="machine_com" class="datepicker">
              <label for="tanggal_masuk">Com Key</label>
            </div>
          </div>
          <div class="row">
            <a href="{{ url('books') }}" class="btn waves-effect waves-light red accent-2" id="cancel_create">Cancel</a>
            <button class="btn waves-effect waves-light blue accent-2" id="btn_create">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
