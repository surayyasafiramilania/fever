<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dataset;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'diagnosa';
    protected $guarded = [];

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }
}
