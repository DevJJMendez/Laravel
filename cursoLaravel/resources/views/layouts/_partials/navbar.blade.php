<nav class="navbar navbar-expand-lg bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-light">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('services') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('contact') }}">Contact</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>