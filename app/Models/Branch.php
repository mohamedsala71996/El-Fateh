<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_name',
        'ar_name',
        // 'phone_number',
        'en_address',
        'ar_address',
    ];
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class, 'branch_id');
    }
}
