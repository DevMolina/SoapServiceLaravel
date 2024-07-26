<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quaternion extends Model
{
    use HasFactory;

    protected $fillable = [
        'a',
        'b',
        'c',
        'd'
    ];

}
