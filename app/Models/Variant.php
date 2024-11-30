<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'additional_variants', 'variant_id', 'additional_id');
    }
}
