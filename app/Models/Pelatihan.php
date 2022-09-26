<?php

namespace App\Models;

use App\Models\Pengujian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihan';
    protected $guarded = [];

    public function pengujian()
    {
        return $this->hasOne(Pengujian::class);
    }
}
