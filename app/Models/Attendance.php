<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'kehadirans'; // <-- Tambahkan ini
    protected $fillable = ['event_id', 'nama', 'nim', 'angkatan'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
