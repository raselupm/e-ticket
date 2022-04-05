<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function listStations() {
        $stations = Station::all();

        $data = [];

        foreach($stations as $station) {
            $data[] = [
                'label' => $station->name,
                'code' => $station->id
            ];
        }


        return response()->json($data, 200);
    }
}
