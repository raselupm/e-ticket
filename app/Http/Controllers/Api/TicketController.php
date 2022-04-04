<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function check(Request $request) {
        $request->validate([
            'from' => 'required|integer',
            'to' => 'required|integer',
            'doj' => 'required',
        ]);


        $data = [];

        // search train on that specific date

        // search if that train has schedule on requested station

        // if found display data
//        $data[] = [
//            'train_name' => '',
//            'train_route' => '',
//            'dep_time' => '',
//            'seats_available' => '',
//            'available' => [
//                [
//                    'type' => '',
//                    'quantity' => '',
//                    'fare' => ''
//                ]
//            ],
//        ];


        return response()->json('ok', 200);
    }
}
