<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pervious_work extends Model
{
    use HasFactory;
    protected $table = "previous_works";
    protected $fillable = [
        'image',
        'en_engineer',
        'en_title',
        'starts_at',
        'ended_at',
        'en_description',
        'ar_description',
        'ar_engineer',
        'ar_title',
        'category_id',

    ];

    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
