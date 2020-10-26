<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','status','completed','deadline'
    ];

    protected $casts = [
        'completed'=> 'datetime',
        'deadline'=> 'datetime'
    ];
}
