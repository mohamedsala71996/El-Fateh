<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUser extends Model
{
    use HasFactory;
    protected $table ='requests';
    protected $fillable = [
        'name',
        'phone_number',
        'governorate',
        'city',
        'detailed_address',
        'description',
    ];
}
