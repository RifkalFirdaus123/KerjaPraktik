<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Laravel</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    html, body {
      height: 100%;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      padding-top: 56px;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
      min-height: calc(100vh - 56px - 60px); /* 56px navbar, 60px footer */
      padding-bottom: 2rem;
    }

    footer {
      flex-shrink: 0;
      background-color: #191970;
      color: white;
      padding: 1rem 0;
    }

    .navbar {
      box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-item a {
      color: white;
      font-size: 14px;
    }

    .nav-item a:hover {
      color: rgb(104,108,109);
    }

    .navbar-brand-text {
      color: white;
      margin-left: 0.5rem;
      font-size: 20px;
      font-weight: 500;
    }
  </style>
</head>
<body class="mt-0 pt-0">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#191970;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo" style="max-width: 60px; height: auto;">
      <span class="navbar-brand-text">Lab. Jaringan Komputer, Keamanan Data, dan Internet of Things</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('homes.index') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('dosens.index') }}">Dosen</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('beritas.index') }}">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Event</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('peminjaman-barangs.index') }}">Peminjaman Barang</a></li>
        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('kehadirans.index') }}">Kehadiran</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('permintaans.index') }}">Permintaan</a></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" style="font-size: 14px;"class="btn btn-link nav-link px-0 text-white">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>


  <!-- Main Content -->
  <main>
    {{-- Breadcrumb Section --}}
    @hasSection('breadcrumb')
      <div class="container mt-5">
        <nav aria-label="breadcrumb" class="mb-3 d-inline-block" style="margin-left: 13px;">
          <ol class="breadcrumb bg-white p-2 rounded shadow-sm mb-0">
            @yield('breadcrumb')
          </ol>
        </nav>
      </div>
    @endif

    {{-- Flash Messages --}}
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @elseif($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Page Content --}}
      @yield('content')
    </div>
  </main>

  <!-- Footer -->
  @include('layouts.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
