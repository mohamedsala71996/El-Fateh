<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_title',
        'ar_title',
        'en_content',
        'ar_content',
        'image',
        'admin_id',
        'pdf'
    ];
}
