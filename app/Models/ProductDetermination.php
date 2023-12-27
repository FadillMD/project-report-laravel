<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetermination extends Model
{
    protected $fillable = ['no_pd', 'type', 'cable_marking'];

    public function soprOrderProducts()
    {
        return $this->hasMany(SoprOrderProduct::class, 'no_pd', 'no_pd');
    }
}
