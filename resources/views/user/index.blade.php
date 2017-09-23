@extends('welcome')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                  <a class="breadcrumb">Data Absensi</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
                <a href="{{ route('sinkronisasi') }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Sinkronisasi"><i class="material-icons">sync</i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tabel Data Absensi</h4>
          </div>
        </div>
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>User ID</th>
              <th>Datetime</th>
              <th>Machine Id</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($data as $key => $value)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->user_id }}</td>
                <td>{{ $value->datetime }}</td>
                <td>{{ $value->machine_id }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="right">
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
