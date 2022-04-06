<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Train;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        return view('home');
    }

    public function check(Request $request) {
        $request->validate([
            'from' => 'required|integer',
            'to' => 'required|integer',
            'doj' => 'required',
        ]);


        $data = [];

        // search train on that specific date
        $trains = Train::where('date', $request->doj)->get();
        foreach($trains as $train) {
            $schedule = Schedule::where('station_id', $request->to)->where('train_id', $train->id)->first();

            if(!empty($schedule)) {
                // has schedule

                $available = [];

                foreach($train->bogis as $bogi) {
                    if($bogi->style == 1) {
                        $fare = $schedule->s_chair_price;
                    } else {
                        $fare = $schedule->shovon_price;
                    }


                    $available[] = [
                        'type' => type_number_by_name()[$bogi->style],
                        'quantity' => $bogi->availableSeats($bogi->id),
                        'fare' => $fare
                    ];
                }


                $data[] = [
                    'train_name' => $train->name,
                    'train_route' => 'test route',
                    'dep_time' => date('F j, Y', strtotime($train->date)) . ' - ' . date('H:i:a', strtotime($schedule->time)),
                    'seats_available' => $train->availableSeats($train->id),
                    'available' => $available,
                ];
            }
        }


        return response()->json($data, 200);
    }
}
