<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Sutta extends Model
{
     protected $fillable = [
        'chapter_id', 'name',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);

    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
