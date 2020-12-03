<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRecordList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'protain',
        'fat',
        'carbo',
        'calorie',
        'quantity',
        'name',
        'favorite_flg',
        'recorded_at',
    ];

    public function user()
    {
       return $this->belogsTo('App\Models\User');
    }
}
