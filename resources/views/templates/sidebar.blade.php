<aside id="left-sidebar-nav">
  <ul id="slide-out" class="side-nav fixed">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#!">First</a></li>
              <li><a href="#!">Second</a></li>
              <li><a href="#!">Third</a></li>
              <li><a href="#!">Fourth</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
  <ul class="right hide-on-med-and-down">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="#!">First</a></li>
      <li><a href="#!">Second</a></li>
      <li><a href="#!">Third</a></li>
      <li><a href="#!">Fourth</a></li>
    </ul>
  </ul>
 <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>



</aside>

@section('footer')
  <script>
    $('.sidebar-collapse').sideNav('show');
  </script>
@endsection
