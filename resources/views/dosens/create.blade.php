@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('homes.index') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('dosens.index') }}">Dosen</a></li>
  <li class="breadcrumb-item active" aria-current="page">Tambah Dosen</li>

@endsection

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('dosens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
