<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = ['contactUs_id', 'branch_id', 'en_title', 'ar_title', 'phone_number'];

    public function contactUs()
    {
        return $this->belongsTo(ContactUs::class, 'contactUs_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}
