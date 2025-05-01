@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kehadiran</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->event->nama_event }}</td>
                    <td>{{ $attendance->nama }}</td>
                    <td>{{ $attendance->nim }}</td>
                    <td>{{ $attendance->angkatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
