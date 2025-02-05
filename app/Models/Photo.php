<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'size',
        'save_at'
    ];
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'foreign_key', 'other_key');
    }
}
