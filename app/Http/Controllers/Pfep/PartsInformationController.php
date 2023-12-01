<?php

namespace App\Http\Controllers\Pfep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartsInformation;

class PartsInformationController extends Controller
{
    public function search( string $num_part ) {
        $data = PartsInformation::select(
            'REG as reg',
            'PART_NUMBER as part_number',
            'PART_DESCRIPTION as part_description',
            'MATERIAL_GROUP as material_group',
            'CBT_CODE as family'
        )
        ->where('part_number', $num_part)
        ->first();

        if( !$data ) {
            return response([
                'status' => 'Creating',
                'msg' => 'No se encontró información'
            ]);
        }

        return response([
            'status' => 'Updating',
            'msg' => '¡Información encontrada exitosamente!',
            'data' => $data
        ]);
    }

    public function store( Request $request ) {

        $data = PartsInformation::create([
            'PART_NUMBER' => $request->part_number,
            'PART_DESCRIPTION' => $request->part_description,
            'CBT_CODE' => $request->familia,
            'MATERIAL_GROUP' => $request->material_group,
        ]);

        if( !$data ) {
            return response([
                'msg' => 'No se pudo crear el registro'
            ]);
        }

        return response([
            'msg' => '¡Información registrada exitosamente!',
            'data' => $data
        ]);

    }

    public function update( Request $request ) {

        $data = PartsInformation::where(
            'REG', $request->reg
        )
        ->update([
            'PART_NUMBER' => $request->part_number,
            'PART_DESCRIPTION' => $request->part_description,
            'MATERIAL_GROUP' => $request->material_group,
            'CBT_CODE' => $request->familia,
        ]);

        if( !$data ) {
            return response([
                'msg' => 'No se pudo editar la información'
            ]);
        }

        return response([
            'msg' => '¡Información actualizada exitosamente!',
            'data' => $data
        ]);
    }
}
