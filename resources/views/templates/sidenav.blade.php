<ul id="slide-out" class="side-nav fixed">
  <li class="waves-effect waves-block @if(str_is(url('/'),url()->current())) active @endif">
    <a href="{{ route('index') }}"><i class="material-icons">assignment</i>Data Absensi</a>
  </li>
  <li class="waves-effect waves-block @if(str_is(route('fingerprint_index').'*',url()->current())) waves-light active @endif">
    <a href="{{ route('fingerprint_index') }}"><i class="material-icons">settings</i>Mesin Absensi</a>
  </li>
</ul>
