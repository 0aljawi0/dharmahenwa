<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalystCoverage extends Model
{
    use HasFactory;

    protected $fillable = [
        'firm',
        'analyst',
        'pdf'
    ];
}
