<?php

namespace App\Models;

use App\Models\service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bande extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ["service"];

    public function service()
    {
        return $this->hasMany(service::class);
    }
}
