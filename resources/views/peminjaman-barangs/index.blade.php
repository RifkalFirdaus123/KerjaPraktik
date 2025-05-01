@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('homes.index') }}">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Peminjaman Barang</li>

@endsection



@section('content')
    <div class="container" style="max-width: 1000px;">
    <div class="bg-white shadow-lg rounded-3 p-4 mb-5">
        <h2 class="text-center mb-4">Form Peminjaman Barang</h2>
        
        <form action="{{ route('peminjaman-barangs.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="nim_nip" class="form-label">NIM/NIP</label>
                    <input type="text" class="form-control" id="nim_nip" name="nim_nip" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">Ajukan Peminjaman</button>
            </div>
        </form>
    </div>
</div>
@endsection
