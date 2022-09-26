<?php

namespace App\Models;

use App\Models\Pelatihan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengujian extends Model
{
    use HasFactory;
    protected $table = 'pengujian';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
