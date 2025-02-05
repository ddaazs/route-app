<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'car_name',
        'created_year',
    ];
    public function photo(): HasMany
    {
        return $this->hasMany(Photo::class, 'foreign_key', 'local_key');
    }
}
