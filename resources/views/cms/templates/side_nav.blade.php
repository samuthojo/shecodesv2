<style media="screen">
  .side-nav {
    /*align-items: flex-start;*/
  }
</style>

<nav class="navbar side-nav bg-warning navbar-light">

  <ul class="navbar-nav">

    <li class="nav-item">
      <a href="{{ route('programs.index') }}" class="nav-link {{ isActiveRoute('programs.*') }}">
        <i></i>Programs
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('courses.index') }}" class="nav-link {{ isActiveRoute('courses.*') }}">
        <i></i>Courses
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('activities.index') }}" class="nav-link {{ isActiveRoute('activities.*') }}">
        <i></i>Activities
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('alumni.index') }}" class="nav-link {{ isActiveRoute('alumni.*') }}">
        <i></i>Alumni
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('testimonials.index') }}" class="nav-link {{ isActiveRoute('testimonials.*') }}">
        <i></i>Testimonials
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('staff.index') }}" class="nav-link {{ isActiveRoute('staff.*') }}">
        <i></i>Staff
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('partners.index') }}" class="nav-link {{ isActiveRoute('partners.*') }}">
        <i></i>Partners
      </a>
    </li>

  </ul>

</nav>
