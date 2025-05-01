@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Isi Kehadiran untuk Event: {{ $event->nama_event }}</h1>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>

        <div class="form-group">
            <label for="angkatan">Angkatan</label>
            <input type="text" class="form-control" id="angkatan" name="angkatan" required>
        </div>

        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <button type="submit" class="btn btn-primary mt-3">Kirim Kehadiran</button>
    </form>
</div>
@endsection
