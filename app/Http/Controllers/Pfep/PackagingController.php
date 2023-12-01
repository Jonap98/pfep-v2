<?php

namespace App\Http\Controllers\Pfep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Packaging;

class PackagingController extends Controller
{
    public function search( string $num_part ) {
        $data = Packaging::select(
            'reg',
            'part_number',
            'part_weight',
            'part_uom',
            'part_length',
            'part_width',
            'part_height',
            'unit_load_description',
            'bc_per_unit_load',
            'pieces_pallet',
            'mixed_load',
            'unit_load_length',
            'unit_load_width',
            'unit_load_heght1',
            'unit_load_diameter',
            'base_container_description',
            'qty_base_container',
            'base_container_length',
            'base_container_width',
            'base_container_height',
            'base_container_diameter',
            'vendor',
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

        $data = Packaging::create([
            'PART_NUMBER' => strtoupper($request->part_number),
            'PART_WEIGHT' => $request->part_weight,
            'PART_UOM' => $request->part_uom,
            'PART_LENGTH' => $request->part_length,
            'PART_WIDTH' => $request->part_width,
            'PART_HEIGHT' => $request->part_height,
            'UNIT_LOAD_DESCRIPTION' => $request->unit_load_description,
            'BC_PER_UNIT_LOAD' => $request->bc_per_unit_load,
            'PIECES_PALLET' => $request->pieces_pallet,
            'MIXED_LOAD' => $request->mixed_load,
            'UNIT_LOAD_LENGTH' => $request->unit_load_length,
            'UNIT_LOAD_WIDTH' => $request->unit_load_width,
            'UNIT_LOAD_HEGHT1' => $request->unit_load_heght1,
            'UNIT_LOAD_DIAMETER' => $request->unit_load_diameter,
            'BASE_CONTAINER_DESCRIPTION' => $request->base_container_description,
            'QTY_BASE_CONTAINER' => $request->qty_base_container,
            'BASE_CONTAINER_LENGTH' => $request->base_container_length,
            'BASE_CONTAINER_WIDTH' => $request->base_container_width,
            'BASE_CONTAINER_HEIGHT' => $request->base_container_height,
            'BASE_CONTAINER_DIAMETER' => $request->base_container_diameter,
            'VENDOR' => $request->vendor,
            'usuario' => $request->usuario
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

        $data = Packaging::where(
            'REG', $request->reg
        )
        ->update([
            'PART_NUMBER' => $request->part_number,
            'PART_WEIGHT' => $request->part_weight,
            'PART_UOM' => $request->part_uom,
            'PART_LENGTH' => $request->part_length,
            'PART_WIDTH' => $request->part_width,
            'PART_HEIGHT' => $request->part_height,
            'UNIT_LOAD_DESCRIPTION' => $request->unit_load_description,
            'BC_PER_UNIT_LOAD' => $request->bc_per_unit_load,
            'PIECES_PALLET' => $request->pieces_pallet,
            'MIXED_LOAD' => $request->mixed_load,
            'UNIT_LOAD_LENGTH' => $request->unit_load_length,
            'UNIT_LOAD_WIDTH' => $request->unit_load_width,
            'UNIT_LOAD_HEGHT1' => $request->unit_load_heght1,
            'UNIT_LOAD_DIAMETER' => $request->unit_load_diameter,
            'BASE_CONTAINER_DESCRIPTION' => $request->base_container_description,
            'QTY_BASE_CONTAINER' => $request->qty_base_container,
            'BASE_CONTAINER_LENGTH' => $request->base_container_length,
            'BASE_CONTAINER_WIDTH' => $request->base_container_width,
            'BASE_CONTAINER_HEIGHT' => $request->base_container_height,
            'BASE_CONTAINER_DIAMETER' => $request->base_container_diameter,
            'VENDOR' => $request->vendor,
            'usuario' => $request->usuario
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
