<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendance; // Model untuk kehadiran
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menampilkan form untuk mengisi kehadiran
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('attendance.create', compact('event'));
    }

    // Menyimpan data kehadiran
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'angkatan' => 'required|string|max:20',
            'event_id' => 'required|exists:events,id', // Menyimpan ID event
        ]);

        Attendance::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'event_id' => $request->event_id,
        ]);

        return redirect()->route('events.index')->with('success', 'Kehadiran berhasil dicatat.');
    }
}
