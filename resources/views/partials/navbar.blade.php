<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <a class="nav-link {{ ($title === "List Kabupaten" ? 'active' : '') }}" href="/kabupaten">Kabupaten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "List Kecamatan" ? 'active' : '') }}" href="/listkec">Kecamatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "List Desa" ? 'active' : '') }}" href="/listdesa">Desa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "List Banjar" ? 'active' : '') }}" href="/listbanjar">Banjar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "List Tokoh" ? 'active' : '') }}" href="/listtokoh">Tokoh</a>
            </li>
              <li>
                <a class="nav-link text-light dropdown-toggle fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">Welcome Back! {{ auth()->user()->name }} <i class="bi bi-person-circle"></i></a>
              </li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-light"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
              </form>
            </li>         
        {{-- <li class="nav-item">
          <a class="nav-link {{ ($title === "All Blog Categories" ? 'active' : '') }}" href="/categories">Category</a>
        </li> --}}
        @else
           <ul class="navbar-nav">
            <li>
              <a href="/" class="nav-link {{ $title === 'Home Page' ? 'active' : '' }}">Homepage</a>
            </li>
            <li>
              <a class="nav-link fw-bold text-light" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
            </li>
            <li>
              <a class="nav-link fw-bold text-light" aria-current="page" href="/register"><i class="bi bi-person-add me-2"></i>Register</a>
            </li>
            </ul>
       @endauth

      </ul>
    </div>
  </nav>