<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopr extends Model
{
    protected $fillable = ['no_sopr', 'customer', 'no_po'];
}
