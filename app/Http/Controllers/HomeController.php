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
        return view('homes.index', [
            'labDescription' => Setting::first()?->lab_description,
            'beritaTerbaru' => Berita::latest()->take(5)->get(),
            'eventTerbaru' => Event::latest()->take(5)->get(),
            // Remove or comment out sections
            // 'sections' => Section::orderBy('order')->get()
        ]);
    }
}
