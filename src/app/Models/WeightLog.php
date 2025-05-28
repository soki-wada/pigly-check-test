<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content'
    ];

    public function scopeDateSearch($query, $olderDate, $newerDate){
        if(!empty($olderDate)){
            $query->where('date', '>=', $olderDate);
        }

        if(!empty($newerDate)){
            $query->where('date', '<=', $newerDate);
        }
    }
}
