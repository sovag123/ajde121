<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipkorsnika extends Model
{
    use HasFactory;
    public function korsnik(){
        return $this->hasMany(Korsnik::class);
    }
}
