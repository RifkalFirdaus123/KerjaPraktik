@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: url("{{ asset('storage/logo/background.jpg') }}") no-repeat center center;
        background-size: cover;
        height: 400px;
        width: 100vw; /* Pastikan menggunakan viewport width */
        margin-left: calc(-50vw + 50%);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        
    }

    
    .hero-logo {
        max-width: 240px;
        margin-bottom: 10px;
    }

    .hero-text {
        font-size: 1.8rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px #000;
    }

    .content-wrapper {
        margin-top: 30px;
    }

    .lab-description {
        font-size: 1.1rem;
        text-align: justify;
    }

    .sidebar .card {
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .hero-text {
            font-size: 1.2rem;
        }

        .hero-logo {
            max-width: 70px;
        }
    }

    .card {
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* shadow dasar */
        border-radius: 1rem;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }


}



</style>

<div class="hero">
    <div>
        <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo Lab" class="hero-logo">
        <div class="hero-text">
            Lab. Jaringan Komputer, Keamanan Data, dan Internet of Things
        </div>
    </div>
</div>

<div class="container content-wrapper">
    <div class="row">
        <!-- Konten utama -->
        <div class="col-md-8">
            <h3>Selamat datang di Laboratorium Jaringan Komputer, Keamanan Data, dan IoT</h3>
            <p class="lab-description">
                Laboratorium ini merupakan bagian dari Fakultas Teknik Universitas Tanjungpura yang fokus pada bidang jaringan komputer, keamanan siber, dan pengembangan sistem berbasis Internet of Things. Kami menyediakan sarana penelitian, praktikum, serta kegiatan akademik lainnya yang menunjang pembelajaran dan inovasi teknologi di bidang tersebut. 
            </p>
        </div>

        <!-- Sidebar untuk berita dan event terbaru -->
        <div class="col-md-4 sidebar">
            @if($beritaTerbaru)  <!-- Pastikan ada berita terbaru -->
                <div class="card">
                    <a href="{{ route('beritas.index') }}" >
                        <img src="{{ asset('storage/' . $beritaTerbaru->foto) }}" class="card-img-top" alt="Thumbnail Berita">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $beritaTerbaru->judul }}</h5>
                        <p class="card-text">{{ Str::limit($beritaTerbaru->isi, 100) }}</p>
                        <a href="{{ route('beritas.index') }}" class="btn btn-primary btn-sm">Lihat Berita</a>
                    </div>
                </div>
            @else
                <p>Tidak ada berita terbaru.</p>
            @endif

            <!-- Menampilkan Event Terbaru -->
            @if($eventTerbaru)  <!-- Pastikan ada event terbaru -->
                <div class="card mt-4">
                    <a href="{{ route('events.index') }}">
                        <img src="{{ asset('storage/' . $eventTerbaru->foto) }}" class="card-img-top" alt="Thumbnail Event">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $eventTerbaru->judul }}</h5>
                        <p class="card-text">{{ Str::limit($eventTerbaru->deskripsi, 100) }}</p>
                        <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">Lihat Event</a>
                    </div>
                </div>
            @else
                <p>Tidak ada event terbaru.</p>
            @endif
        </div>
    </div>
</div>

@endsection
