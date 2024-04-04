<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table='contact_us';


    protected $fillable = [
        'en_name',
        'ar_name',
        'phone_number',
        'en_message',
        'ar_message',
        'contact_email',
        'en_terms_conditions',
        'ar_terms_conditions',
    ];
}
