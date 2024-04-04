<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    
    protected $table='about_us';
    protected $fillable = [
        'en_company_name',
        'ar_company_name',
        'en_location',
        'ar_location',
        'en_about_text',
        'ar_about_text',
        'founded_date',
        'website',
        'contact_email',
        'phone_number',
    ];
}
