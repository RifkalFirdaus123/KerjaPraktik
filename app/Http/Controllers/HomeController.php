<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event; // Import model Event
use App\Models\Setting; // Import model Setting
use App\Models\Section; // Import model Section
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $labDescription = Setting::first()->lab_description ?? 'Deskripsi default...'; // Atur sesuai model/field Anda
        $sections = Section::orderBy('order')->get(); // Section dinamis, jika ada
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $eventTerbaru = Event::latest()->take(5)->get();

        return view('homes.index', compact('labDescription', 'sections', 'beritaTerbaru', 'eventTerbaru'));
    }
}
