<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event; // Import model Event
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil berita terbaru
        $beritaTerbaru = Berita::latest()->first();  
        
        // Mengambil event terbaru
        $eventTerbaru = Event::latest()->first(); 

        return view('homes.index', compact('beritaTerbaru', 'eventTerbaru')); // Passing beritaTerbaru dan eventTerbaru ke view
    }
}
