<header>
  <nav class="navbar navbar-expand-md sport-navbar py-2 mb-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark mb-0 py-0" href="{{ url('/') }}">
        <span class="d-inline-flex align-items-center justify-content-center text-white rounded-3"
          style="width: 42px; height: 42px; background-color: #FF6B35; border: 2.5px solid #111827; box-shadow: 2.5px 2.5px 0 #111827;">
          <i class="bi bi-trophy-fill fs-5"></i>
        </span>
        <div>
          <span class="fs-5 fw-black text-dark text-uppercase d-block lh-1">Court <span style="color: #FF6B35;">90</span></span>
        </div>
      </a>

      <button class="navbar-toggler border-2 border-dark p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto ms-md-4 mb-2 mb-md-0 gap-1">
          <li class="nav-item">
            <a class="nav-link fw-bold px-3 py-1 rounded-2 text-uppercase text-dark" href="{{ url('/') }}">
              <i class="bi bi-people-fill me-1"></i> Roster Pelanggan
            </a>
          </li>
        </ul>
      </div>
        <div class="d-flex align-items-center gap-2 ms-auto">
          @auth
            <div class="d-flex align-items-center gap-2 me-2">
              <span class="fw-bold text-dark">Halo, {{ Auth::user()->name }}</span>
              <span class="badge text-uppercase fw-black px-2 py-1"
                    style="background-color: {{ Auth::user()->role === 'admin' ? '#ECA72C' : '#004E98' }};
                           color: {{ Auth::user()->role === 'admin' ? '#111827' : '#ffffff' }};
                           border: 1.5px solid #111827; box-shadow: 2px 2px 0 #111827;">
                {{ Auth::user()->role }}
              </span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-sm btn-danger fw-bold" style="border: 2px solid #111827;">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
              </button>
            </form>
          @else
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark fw-bold">Login</a>
            <a href="{{ route('register') }}" class="btn btn-sm sport-btn-primary fw-bold text-white" style="background-color: #FF6B35;">Register</a>
          @endauth
        </div>
    </div>
  </nav>
</header>
