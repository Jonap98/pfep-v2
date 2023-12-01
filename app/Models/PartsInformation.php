<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsInformation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'PFEP_part_information';
    protected $fillable = [
        'PART_NUMBER',
        'PART_DESCRIPTION',
        'CBT_CODE',
        'MATERIAL_GROUP',
        // 'usuario',
    ];
}
