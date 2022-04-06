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
                $available_type = [];
                $seatsAvailable = Seat::where('train_id', $train->id)->where('booked', 0)->get();


                foreach ($seatsAvailable as $seatAvailable) {
                    $available_type[] = $seatAvailable->type;
                }

                $unique_available_type = array_unique($available_type);


                $total_seats = 0;
                $available = [];
                foreach($unique_available_type as $type) {
                    $seatsTypeAvailable = Seat::where('train_id', $train->id)->where('booked', 0)->where('type', $type)->get();

                    if($type == 1) {
                        $fare = $schedule->s_chair_price;
                    } else {
                        $fare = $schedule->shovon_price;
                    }

                    $available[] = [
                        'type' => type_number_by_name()[$type],
                        'quantity' => count($seatsTypeAvailable),
                        'fare' => $fare
                    ];

                    $total_seats += count($seatsTypeAvailable);
                }

                $data[] = [
                    'train_name' => $train->name,
                    'train_route' => 'test route',
                    'dep_time' => date('F j, Y', strtotime($train->date)) . ' - ' . date('H:i:a', strtotime($schedule->time)),
                    'seats_available' => $total_seats,
                    'available' => $available,
                ];
            }
        }


        return response()->json($data, 200);
    }
}
