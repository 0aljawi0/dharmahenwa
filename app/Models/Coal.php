<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coal extends Model
{
    use HasFactory;

    protected $table = 'coals';

    protected $fillable = [
        'image',
        'title',
        'description'
    ];
}
