<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalVariant extends Model
{
    use HasFactory;

    public function additioinals()
    {
        return $this->belongsTo('additional');
    }

    public function variants()
    {
        return $this->belongsTo('variant');
    }
}
