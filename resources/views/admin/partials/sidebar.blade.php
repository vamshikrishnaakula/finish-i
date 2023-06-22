<aside class="sidebar-nav-wrapper">
  <div class="navbar-logo">
    <a href="{{ route('dashboard') }}">
      <img src="{{ asset('images/logo.png') }}" class="w-100" alt="logo" />
    </a>
  </div>
  <nav class="sidebar-nav">
    <ul>
      <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
        <a href="{{ route('dashboard') }}">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-item-has-children">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#roles" aria-controls="roles" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Roles</span>
        </a>
        <ul id="roles" class="collapse dropdown-nav">
          <li>
            <a class="@if(Route::is('roles.index')) active @endif" href="{{ route('roles.index') }}"> Role List</a>
          </li>
          <li>
            <a class="@if(Route::is('roles.create')) active @endif" href="{{ route('roles.create') }}"> Create Role </a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-item-has-children @if (request()->routeIs('users')) active @endif">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#users" aria-controls="users" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Users</span>
        </a>
        <ul id="users" class="collapse dropdown-nav  @if(Route::is('users.*')) show @endif">
          <li>
            <a class="@if(Route::is('users.index')) active @endif" href="{{ route('users.index') }}"> Users List </a>
          </li>
          <li>
            <a class="@if(Route::is('users.create')) active @endif" href="{{ route('users.create') }}"> Create User</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-item-has-children @if(Route::is('eventtypes.*')) active @endif">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#eventtypes" aria-controls="eventtypes" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Event Types</span>
        </a>
        <ul id="eventtypes" class="collapse dropdown-nav">
          <li>
            <a class="@if(Route::is('eventtypes.index')) active @endif" href="{{ route('eventtypes.index') }}"> Event Types List</a>
          </li>
          <li>
            <a class="@if(Route::is('eventtypes.create')) active @endif" href="{{ route('eventtypes.create') }}"> Create Event Types</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-item-has-children @if(Route::is('events.*')) active @endif">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#eventcategory" aria-controls="eventcategory" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Events Category</span>
        </a>
        <ul id="eventcategory" class="collapse dropdown-nav">
          <li>
            <a class="@if(Route::is('eventcategories.index')) active @endif" href="{{ route('eventcategories.index') }}"> Event Categories List</a>
          </li>
          <li>
            <a class="@if(Route::is('eventcategories.create')) active @endif" href="{{ route('eventcategories.create') }}"> Create Event Category</a>
          </li>
          <li>
               <a class="@if(Route::is('tejan.create')) active @endif" href="/admin/eventForm">Event Form</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-item-has-children @if(Route::is('events.*')) active @endif">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#events" aria-controls="events" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Events</span>
        </a>
        <ul id="events" class="collapse dropdown-nav">
          <li>
            <a class="@if(Route::is('events.index')) active @endif" href="{{ route('events.index') }}"> Events List</a>
          </li>
          <li>
            <a class="@if(Route::is('events.create')) active @endif" href="{{ route('events.create') }}"> Create Event </a>
          </li>
        </ul>
      </li>
      {{-- registration_fields --}}
      <li class="nav-item nav-item-has-children  @if(Route::is('registrationsection.*')) active @endif"> 
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#registrationsection" aria-controls="registrationsection" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Reg_section</span>
        </a>
        <ul id="registrationsection" class="collapse dropdown-nav">
          <li>
           <a  href="{{ route('registrationsection.index') }}"> Reg_section List</a>
          </li>
          <li>
            <a  href="{{ route('registrationsection.create') }}"> Create Reg_section </a>
          </li>
        </ul>
      </li>
    {{-- custom_feilds --}}

      <li class="nav-item nav-item-has-children  @if(Route::is('custom_feilds.*')) active @endif"> 
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#custom_feilds" aria-controls="custom_feilds" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">custom_feilds</span>
        </a>
        <ul id="custom_feilds" class="collapse dropdown-nav">
          <li>
            <a  href="{{ route('customfeilds.index') }}"> CustomFeilds List</a>
          </li>
          <li>
            <a  href="{{ route('customfeilds.create') }}"> Create CustomFeilds</a>
          </li>
        </ul>
      </li>

      {{-- eventreg --}}



      <li class="nav-item nav-item-has-children  @if(Route::is('eventregistration.*')) active @endif"> 
        
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#eventregistration" aria-controls="eventregistration" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <i class="lni lni-dashboard"></i>
          </span>
          <span class="text">Event_registration</span>
        </a>
        <ul id="eventregistration" class="collapse dropdown-nav">
          <li>
            <a  href="{{ route('eventregistration.index') }}"> Registration List</a>
          </li>
          <li>
            <a  href="{{ route('eventregistration.create') }}"> Create Registration list</a>
          </li>
        </ul>
      </li>



































      
      <li class="nav-item">
        <a href="#">
          <span class="icon">
            <i class="lni lni-cog"></i>
          </span>
          <span class="text">Notifications</span>
        </a>
      </li>

      {{-- <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_4"
              aria-controls="ddmenu_4"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg
                  width="22"
                  height="22"
                  viewBox="0 0 22 22"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z"
                  />
                </svg>
              </span>
              <span class="text">UI Elements </span>
            </a>
            <ul id="ddmenu_4" class="collapse dropdown-nav">
              <li>
                <a href="alerts.html"> Alerts </a>
              </li>
              <li>
                <a href="buttons.html"> Buttons </a>
              </li>
              <li>
                <a href="cards.html"> Cards </a>
              </li>
              <li>
                <a href="typography.html"> Typography </a>
              </li>
            </ul>
          </li> 
          <span class="divider"><hr /></span> --}}
    </ul>
  </nav>
</aside>
<div class="overlay"></div>