<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    protected $table = 'PFEP_supply';
    protected $fillable = [
        'PART_NUMBER',
        'WHERE_USED_ITEM',
        'DELIVERY_LOCATION',
        'WHERE_USED_LINE',
        'ROUTE',
        'METHOD_OF_PART_DELIVERY',
        'STOP',
        'MAX_UNITS_PER_ROUTE', // Validar si es rack o route
        'MIN_UNITS_PER_ROUTE', // Validar si es rack o route
        'SEQUENCED_PART',
        'usuario',
    ];
}
