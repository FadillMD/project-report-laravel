<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetermination extends Model
{
    protected $fillable = ['no_pd', 'type', 'cable_marking'];

    public function soprs()
    {
        return $this->belongsToMany(Sopr::class, 'sopr_product_determination', 'no_pd', 'no_sopr')
            ->withPivot(['code_number', 'qty_order', 'delivery_req', 'notes'])
            ->withTimestamps();
    }
    
}
