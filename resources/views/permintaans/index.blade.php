@extends('layouts.app')


@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('homes.index') }}">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Peminjaman Barang</li>
@section('content')
<style>
    .table {
        background-color: #ffffff;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 20px 12px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 12px;
    }

    .table tbody tr {
        transition: background-color 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-size: 0.85em;
        border-radius: 5px;
    }

    .btn {
        border-radius: 5px !important;
    }

    /* Untuk responsive jika diperlukan */
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }
    }
</style>

<div class="container">
    <h2>Daftar Permintaan Peminjaman Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Peminjam</th>
                <th>NIM/NIP</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamanBarangs as $peminjaman)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peminjaman->nama_peminjam }}</td>
                <td>{{ $peminjaman->nim_nip }}</td>
                <td>{{ $peminjaman->nama_barang }}</td>
                <td>{{ $peminjaman->jumlah }}</td>
                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                <td>
                    @if($peminjaman->status == 'Disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @elseif($peminjaman->status == 'Tidak Disetujui')
                        <span class="badge bg-danger">Tidak Disetujui</span>
                    @else
                    @endif
                    
                </td>
                <td>
                    @if($peminjaman->status == null || $peminjaman->status == 'Belum Disetujui')
                        <!-- Tombol Disetujui -->
                        <form action="{{ route('permintaans.updateStatus', $peminjaman->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Disetujui</button>
                        </form>
                        <!-- Tombol Tidak Disetujui -->
                        <form action="{{ route('permintaans.updateStatusDitolak', $peminjaman->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Tidak Disetujui</button>
                        </form>
                    @else
                        <span class="text-muted">Status telah diproses</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Permintaan yang Disetujui</h2>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Peminjam</th>
            <th>NIM/NIP</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjamanBarangsDisetujui as $peminjaman)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peminjaman->nama_peminjam }}</td>
            <td>{{ $peminjaman->nim_nip }}</td>
            <td>{{ $peminjaman->nama_barang }}</td>
            <td>{{ $peminjaman->jumlah }}</td>
            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
            <td>{{ $peminjaman->tanggal_pengembalian }}</td>
            <td>
                @if($peminjaman->status === 'Disetujui')
                    <div class="d-flex gap-2">
                        <form action="{{ route('peminjaman.cancel', $peminjaman->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan peminjaman ini?')">
                                Batal
                            </button>
                        </form>

                        <form action="{{ route('peminjaman.complete', $peminjaman->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menyelesaikan peminjaman ini?')">
                                Selesai
                            </button>
                        </form>
                    </div>
                @else
                    <span class="text-muted">Status telah diproses</span>
                @endif
            </td>
            <td>
                <span class="badge {{ 
                    $peminjaman->status === 'Batal Dipinjam' ? 'bg-danger' : 
                    ($peminjaman->status === 'Selesai Dipinjam' ? 'bg-success' : 
                    ($peminjaman->status === 'Disetujui' ? 'bg-primary' : 'bg-secondary')) 
                }}">
                    {{ $peminjaman->status }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

</div>
@endsection
