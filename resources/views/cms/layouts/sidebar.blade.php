<nav class="sidebar-nav">
  
  <ul class="nav">
    
    <li class="nav-item">
      <a class="nav-link {{ isActiveRoute('home') }}" href="{{url('/admin')}}">
        <i class="nav-icon cui-speedometer"></i> Dashboard
      </a>
    </li>
    
    <li class="nav-title">Featured</li>

    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['programs.index', 'programs.create', 'programs.edit']) }}" 
        href="{{ route('programs.index') }}">
        <i class="nav-icon cui-layers"></i> Programs
      </a>
    </li>
        
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['courses.index', 'courses.create', 'courses.edit']) }}" 
         href="{{ route('courses.index') }}">
      <i class="nav-icon cui-note"></i>Courses</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['activities.index', 'activities.create', 'activities.edit']) }}" 
         href="{{ route('activities.index') }}">
      <i class="nav-icon cui-calendar"></i>Activities</a>
    </li>
    
    <li class="nav-title">Members</li>
    
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['staff.index', 'staff.create', 'staff.edit']) }}" 
         href="{{ route('staff.index') }}">
      <i class="nav-icon cui-briefcase"></i>Staff</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['alumnis.index', 'alumnis.create', 'alumnis.edit']) }}" 
         href="{{ route('alumnis.index') }}">
      <i class="nav-icon cui-people"></i>Alumni</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['testimonials.index', 'testimonials.create', 'testimonials.edit']) }}" 
        href="{{ route('testimonials.index') }}">
        <i class="nav-icon cui-comment-square"></i>Testimonials
      </a>
    </li>
    
    <li class="nav-title">Partners</li>
    
    <li class="nav-item">
      <a class="nav-link {{ areActiveRoutes(['partners.index', 'partners.create', 'partners.edit']) }}" 
        href="{{ route('partners.index') }}">
        <i class="nav-icon fa fa-handshake-o"></i>Partners
      </a>
    </li>
    
    {{-- Learn Nav With DropDown Menu --}}
    <li class="nav-item nav-dropdown d-lg-none">
      
      <a class="nav-link nav-dropdown-toggle" href="#">
        Account
      </a>
    
      <ul class="nav-dropdown-items">
        
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="cui-account-logout"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}"
            method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('change_password') }}">
            <i class="cui-lock-unlocked"></i> Change password
          </a>
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
</nav>
