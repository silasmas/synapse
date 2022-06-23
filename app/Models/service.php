<?php

namespace App\Models;

use App\Models\bande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ["branche", "galerie"];
    public function branche()
    {
        return $this->belongsTo(bande::class);
    }
    public function galerie()
    {
        return $this->hasMany(galerie::class);
    }
}
