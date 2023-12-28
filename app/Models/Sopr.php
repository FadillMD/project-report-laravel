<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopr extends Model
{
    protected $fillable = ['no_sopr', 'customer', 'no_po'];
    
    public function productDeterminations()
    {
        return $this->belongsToMany(ProductDetermination::class, 'sopr_product_determinations', 'no_sopr', 'no_pd')
            ->withPivot(['code_number', 'qty_order', 'delivery_req', 'notes'])
            ->withTimestamps();
    }
    
}
