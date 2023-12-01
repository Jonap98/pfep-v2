<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    use HasFactory;
    protected $table = 'PFEP_packaging';
    protected $fillable = [
        'REG',
        'PART_NUMBER',
        'PART_WEIGHT',
        'PART_UOM',
        'PART_LENGTH',
        'PART_WIDTH',
        'PART_HEIGHT',
        'UNIT_LOAD_DESCRIPTION',
        'BC_PER_UNIT_LOAD',
        'PIECES_PALLET',
        'MIXED_LOAD',
        'UNIT_LOAD_LENGTH',
        'UNIT_LOAD_WIDTH',
        'UNIT_LOAD_HEGHT1',
        'UNIT_LOAD_DIAMETER',
        'BASE_CONTAINER_DESCRIPTION',
        'QTY_BASE_CONTAINER',
        'BASE_CONTAINER_LENGTH',
        'BASE_CONTAINER_WIDTH',
        'BASE_CONTAINER_HEIGHT',
        'BASE_CONTAINER_DIAMETER',
        'VENDOR',
        'usuario',
    ];
}
