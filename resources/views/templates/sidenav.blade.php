<ul id="slide-out" class="side-nav fixed">
  <li class="waves-effect waves-block"><a href="{{ url('/') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
  <li class="no-padding mobile-menu">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Master<i class="material-icons">collections_bookmark</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">School Year</a></li>
            <li><a href="#!">Majors</a></li>
            <li><a href="#!">Grade</a></li>
            <li><a href="#!">Student</a></li>
            <li><a href="#!">Timetable</a></li>
            <li><a href="#!">Calendar Academic</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Report<i class="material-icons">insert_drive_file</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">Student</a></li>
            <li><a href="#!">Recapitulation</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Setting<i class="material-icons">settings</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="{{ url('setting/fingerprint') }}">Fingerprint</a></li>
            <li><a href="#!">SMS</a></li>
            <li><a href="#!">Preferences</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>

  <li><div class="divider hide-on-med-and-down"></div></li>
  <li><a class="subheader hide-on-med-and-down">Master</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/languages') }}"><i class="material-icons">language</i>School Year</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/publishers') }}"><i class="material-icons">public</i>Majors</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/publishers') }}"><i class="material-icons">public</i>Grade</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/publishers') }}"><i class="material-icons">public</i>Student</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/racks') }}"><i class="material-icons">label</i>Timetable</a></li>
  <li class="waves-effect waves-block hide-on-med-and-down"><a href="{{ url('master/sources') }}"><i class="material-icons">lightbulb_outline</i>Calendar Academic</a></li>

  <li class="mobile-menu"><div class="divider"></div></li>
   <li class="mobile-menu"><a class="subheader">Akun Anda</a></li>
  <li class="mobile-menu waves-effect waves-block"><a href="{{ url('user') }}"><i class="material-icons">account_circle</i>User</a></li>
  <li class="mobile-menu waves-effect waves-block"><a href="{{ url('auth/logout') }}"><i class="material-icons">exit_to_app</i>Keluar</a></li>
  <li class="mobile-menu waves-effect waves-block"><a href="http://110.232.89.67/saspro"><i class="material-icons">apps</i>SiPUINTer</a></li>
</ul>
