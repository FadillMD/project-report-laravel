<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoprOrderProduct extends Model
{
    protected $fillable = ['no_sopr', 'no_pd', 'qty_order', 'delivery_req', 'notes'];

    public function sopr()
    {
        return $this->belongsTo(Sopr::class, 'no_sopr', 'no_sopr');
    }

    public function productDetermination()
    {
        return $this->belongsTo(ProductDetermination::class, 'no_pd', 'no_pd');
    }
}
