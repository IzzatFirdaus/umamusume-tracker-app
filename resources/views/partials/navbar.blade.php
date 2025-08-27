<nav class="navbar sticky-top" role="navigation" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('plans.list') }}">
      <img src="{{ asset('uploads/app_logo/uma_musume_race_planner_logo_64.ico') }}" alt="App Logo" class="logo" aria-hidden="true">
      <span class="fw-semibold" style="font-family: 'Poppins', Arial, sans-serif; font-size: 1.5rem;">Uma Musume Planner</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav ms-auto" role="menubar">
        <li class="nav-item" role="none">
          <a class="nav-link {{ request()->routeIs('plans.list') ? 'active' : '' }}" href="{{ route('plans.list') }}" role="menuitem" tabindex="0">
            <i class="bi bi-house-door me-1" aria-hidden="true"></i> Home
          </a>
        </li>
        <li class="nav-item" role="none">
          <a class="nav-link" href="#" id="newPlanBtn" role="menuitem" tabindex="0">
            <i class="bi bi-plus-circle me-1" aria-hidden="true"></i> New Plan
          </a>
        </li>
        <li class="nav-item" role="none">
          <a class="nav-link {{ request()->routeIs('guide') ? 'active' : '' }}" href="{{ url('guide') }}" role="menuitem" tabindex="0">
            <i class="bi bi-book me-1" aria-hidden="true"></i> Guide
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
