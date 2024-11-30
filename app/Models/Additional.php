<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Additional extends Model
{
    use HasFactory;
    protected $fillable = [
      "name",
      "description"
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function variants()
    {
        return $this->belongsToMany(variant::class, 'additional_variants', 'additional_id', 'variant_id');
    }

}
