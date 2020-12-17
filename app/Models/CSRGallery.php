<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSRGallery extends Model
{
    use HasFactory;

    protected $table = 'csr_galleries';

    protected $fillable = ['title', 'image'];
}
