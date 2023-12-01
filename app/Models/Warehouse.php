<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'PFEP_warehouse';
    protected $fillable = [
        'REG',
        'PART_NUMBER',
        'MATERIAL_REPLENISHMENT_AREA',
        'MATERIAL_REPLENISHMENT_UOM',
        'QTY_UNIT',
        'MAX_STORAGE_LEVEL',
        'MIN_STORAGE_LEVEL',
        'D_PICK_LOCATION',
        'D_PICK_SIGNAL',
        'D_PICK_LOCATION_UOM',
        'D_QTY_UNIT',
        'D_MAX_STORAGE_LEVEL',
        'D_MIN_STORAGE_LEVEL',
        'usuario',
    ];
}
