<?php

namespace App\Http\Controllers\Pfep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Supply;

class SupplyController extends Controller
{
    public function search( string $num_part ) {
        $data = Supply::select(
            'FOLIO as folio',
            'PART_NUMBER as part_number',
            'WHERE_USED_ITEM as where_used_item',
            'DELIVERY_LOCATION as delivery_location',
            'WHERE_USED_LINE as where_used_line',
            'ROUTE as route',
            'METHOD_OF_PART_DELIVERY as method_of_part_delivery',
            'STOP as stop',
            'MAX_UNITS_PER_ROUTE as max_units_per_route',
            'MIN_UNITS_PER_ROUTE as min_units_per_route',
            'SEQUENCED_PART as sequenced_part',
        )
        ->where('part_number', $num_part)
        ->get();


        if( count($data) == 0 ) {
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

        $data = Supply::create([
            'PART_NUMBER' => $request->part_number,
            'WHERE_USED_ITEM' => $request->where_used_item,
            'DELIVERY_LOCATION' => $request->delivery_location,
            'WHERE_USED_LINE' => $request->where_used_line,
            'ROUTE' => $request->route,
            'METHOD_OF_PART_DELIVERY' => $request->method_of_part_delivery,
            'STOP' => $request->stop,
            'MAX_UNITS_PER_ROUTE' => $request->max_units_per_route,
            'MIN_UNITS_PER_ROUTE' => $request->min_units_per_route,
            'SEQUENCED_PART' => $request->sequenced_part,
            'usuario' => $request->usuario,
        ]);

        $mapped = [
            'folio' => $data->id,
            'part_number' => $data->PART_NUMBER,
            'where_used_item' => $data->WHERE_USED_ITEM,
            'delivery_location' => $data->DELIVERY_LOCATION,
            'where_used_line' => $data->WHERE_USED_LINE,
            'route' => $data->ROUTE,
            'method_of_part_delivery' => $data->METHOD_OF_PART_DELIVERY,
            'stop' => $data->STOP,
            'max_units_per_route' => $data->MAX_UNITS_PER_ROUTE,
            'min_units_per_route' => $data->MIN_UNITS_PER_ROUTE,
            'sequenced_part' => $data->SEQUENCED_PART,
            'usuario' => $data->usuario,
        ];


        if( !$data ) {
            return response([
                'msg' => 'No se pudo registrar la ubicación'
            ]);
        }

        return response([
            'msg' => '¡Ubicación registrada exitosamente!',
            'data' => $mapped,
        ]);
    }

    public function update( Request $request ) {

        $data = Supply::where(
            'FOLIO', $request->ubicacion['folio']
        )
        ->update([
            'PART_NUMBER' => $request->ubicacion['part_number'],
            'WHERE_USED_ITEM' => $request->ubicacion['where_used_item'],
            'DELIVERY_LOCATION' => $request->ubicacion['delivery_location'],
            'WHERE_USED_LINE' => $request->ubicacion['where_used_line'],
            'ROUTE' => $request->ubicacion['route'],
            'METHOD_OF_PART_DELIVERY' => $request->ubicacion['method_of_part_delivery'],
            'STOP' => $request->ubicacion['stop'],
            'MAX_UNITS_PER_ROUTE' => $request->ubicacion['max_units_per_route'],
            'MIN_UNITS_PER_ROUTE' => $request->ubicacion['min_units_per_route'],
            'SEQUENCED_PART' => $request->ubicacion['sequenced_part'],
            'usuario' => $request->usuario,
        ]);

        if( !$data ) {
            return response([
                'msg' => 'No se pudo editar la ubicación'
            ]);
        }

        return response([
            'msg' => '¡Ubicación actualizada exitosamente!',
            'data' => $request->all()
        ]);

    }

    public function delete( Request $request ) {

        $data = Supply::where(
            'FOLIO', $request->folio
        )
        ->delete();

        if( !$data ) {
            return response([
                'msg' => 'No se pudo eliminar la ubicación'
            ]);
        }

        return response([
            'msg' => '¡Ubicación eliminada exitosamente!',
            'data' => $request->all()
        ]);
    }
}
