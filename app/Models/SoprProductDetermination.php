<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoprProductDetermination extends Model
{
    protected $table = 'sopr_product_determinations';

    protected $fillable = [
        'sopr_id',
        'product_determination_id',
        'code_number',
        'qty_order',
        'delivery_req',
        'notes',
        // Add other fields as needed
    ];

    public function sopr()
    {
        return $this->belongsTo(Sopr::class, 'sopr_id', 'id');
    }

    public function productDetermination()
    {
        return $this->belongsTo(ProductDetermination::class, 'product_determination_id', 'id');
    }
}