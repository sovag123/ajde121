<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korsnik extends Model
{
    use HasFactory;
    public function tipkorsnika(){
        return $this->belongsTo(Tipkorsnika::class);
    }
}
