<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'date',
        'user-id',
        'familly_id'



    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
