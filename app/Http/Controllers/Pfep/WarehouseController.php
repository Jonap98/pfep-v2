<?php

namespace App\Http\Controllers\Pfep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Warehouse;

class WarehouseController extends Controller
{
    public function search( $num_part ) {
        $data = Warehouse::select(
            'REG as reg',
            'PART_NUMBER as part_number',
            'D_PICK_LOCATION as d_pick_location',
            'D_QTY_UNIT as std_pack',
            'D_MIN_STORAGE_LEVEL as min_ubicacion'
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

        $data = Warehouse::create([
            'PART_NUMBER' => $request->part_number,
            'D_PICK_LOCATION' => $request->ubicacion,
            'D_QTY_UNIT' => $request->std_pack,
            'D_MIN_STORAGE_LEVEL' => $request->min_ubicacion,
            'usuario' => $request->usuario,
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

        $data = Warehouse::where(
            'REG', $request->reg
        )
        ->update([
            'PART_NUMBER' => $request->part_number,
            'D_PICK_LOCATION' => $request->ubicacion,
            'D_QTY_UNIT' => $request->std_pack,
            'D_MIN_STORAGE_LEVEL' => $request->min_ubicacion,
            'usuario' => $request->usuario,
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
