<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    // Menampilkan daftar semua permintaan dan yang disetujui
    public function index()
    {
        $peminjamanBarangs = PeminjamanBarang::all();

        $peminjamanBarangsDisetujui = PeminjamanBarang::whereIn('status', [
            'Disetujui', 'Selesai Dipinjam', 'Batal Dipinjam'
        ])->get();

        return view('permintaans.index', compact('peminjamanBarangs', 'peminjamanBarangsDisetujui'));
    }

    // Menyetujui permintaan
    public function updateStatus($id)
    {
        $peminjaman = PeminjamanBarang::findOrFail($id);

        if ($peminjaman->status !== 'Disetujui') {
            $peminjaman->status = 'Disetujui';
            $peminjaman->save();

            return redirect()->route('permintaans.index')
                ->with('success', 'Permintaan berhasil disetujui!');
        }

        return redirect()->route('permintaans.index')
            ->with('info', 'Permintaan sudah disetujui sebelumnya.');
    }

    // Menolak permintaan
    public function updateStatusDitolak($id)
    {
        $peminjaman = PeminjamanBarang::findOrFail($id);
        $peminjaman->status = 'Tidak Disetujui';
        $peminjaman->save();

        return redirect()->route('permintaans.index')
            ->with('error', 'Permintaan telah ditolak.');
    }

    // Menandai peminjaman sebagai "Telah Dikembalikan"
    public function markAsReturned($id)
    {
        $peminjaman = PeminjamanBarang::findOrFail($id);
        $peminjaman->status = 'Telah Dikembalikan';
        $peminjaman->save();

        return redirect()->route('permintaans.index')
            ->with('success', 'Status berhasil diperbarui menjadi Telah Dikembalikan.');
    }

    // Membatalkan peminjaman
    public function markAsCancelled($id)
    {
        try {
            $peminjaman = PeminjamanBarang::findOrFail($id);

            if ($peminjaman->status === 'Disetujui') {
                $peminjaman->status = 'Batal Dipinjam';
                $peminjaman->save();

                return redirect()->route('permintaans.index')
                    ->with('success', 'Peminjaman berhasil dibatalkan.');
            }

            return redirect()->route('permintaans.index')
                ->with('error', 'Peminjaman hanya dapat dibatalkan jika statusnya Disetujui.');
        } catch (\Exception $e) {
            return redirect()->route('permintaans.index')
                ->with('error', 'Terjadi kesalahan saat membatalkan peminjaman.');
        }
    }

    // Menyelesaikan peminjaman
    public function markAsCompleted($id)
    {
        try {
            $peminjaman = PeminjamanBarang::findOrFail($id);

            if ($peminjaman->status === 'Disetujui') {
                $peminjaman->status = 'Selesai Dipinjam';
                $peminjaman->save();

                return redirect()->route('permintaans.index')
                    ->with('success', 'Peminjaman telah ditandai sebagai selesai.');
            }

            return redirect()->route('permintaans.index')
                ->with('error', 'Tidak dapat menyelesaikan peminjaman yang bukan berstatus Disetujui.');
        } catch (\Exception $e) {
            return redirect()->route('permintaans.index')
                ->with('error', 'Terjadi kesalahan saat menyelesaikan peminjaman.');
        }
    }
}
