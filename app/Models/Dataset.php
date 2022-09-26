<?php

namespace App\Models;

use App\Models\DataUji;
use App\Models\Diagnosa;
use App\Models\DataLatih;
use App\Models\DataModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dataset extends Model
{
    use HasFactory;
    protected $table = 'dataset';
    protected $guarded = [];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'diagnosa_id');
    }
    public function dataModel()
    {
        return $this->hasOne(DataModel::class);
    }
    public function dataUji()
    {
        return $this->hasOne(DataUji::class);
    }
    public function dataLatih()
    {
        return $this->hasOne(DataLatih::class);
    }
}
