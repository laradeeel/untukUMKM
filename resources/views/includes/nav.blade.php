<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/"><b>Pesan Makanan</b></a>
        @php
            if(auth()->user()) {
              $nama = auth()->user()->nama;
            } else {
              $nama = '';
            }
        @endphp
        <div class="navbar-brand position-relative translate-bottom"> | {{ $nama }}</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          @if (auth()->user())
          <a class="nav-link {{ ($title == 'Home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          @endif
          @auth
          @if (in_array(auth()->user()->is_admin, [1]))
          <a class="nav-link {{ ($title == 'Tambah Menu') ? 'active' : '' }}" href="/tambah-menu">Tambah Menu</a>
          @endif
          @endauth
          @if (auth()->user())
          <a class="nav-link {{ ($title == 'Profil') ? 'active' : '' }}" href="/profil">Profil</a>
          <a class="nav-link" href="/logout" onclick="return confirm('Yakin Mau Keluar?');">Logout</a>
          @else
          <a class="nav-link {{ ($title == 'Login') ? 'active' : '' }}" href="/login">Login</a>
          <a class="nav-link {{ ($title == 'Register') ? 'active' : '' }}" href="/register">Register</a>
          @endif
        </div>
      </div>
    </div>
</nav>
