<?php

namespace App\Models;

use App\Models\Dataset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUji extends Model
{
    use HasFactory;
    protected $table = 'data_uji';
    protected $guarded = [];

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }
}
