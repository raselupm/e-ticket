<?php

namespace App\Http\Controllers;

use App\Models\Bogi;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Train;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function trains() {
        $trains = Train::paginate(50);
        return view('train.index', ['trains' => $trains]);
    }

    public function editTrain($id) {
        $train = Train::findOrFail($id);

        return view('train.edit', ['train' => $train]);
    }

    public function deleteBogi($id) {
        $bogi = Bogi::findOrFail($id);
        //$bogi->seats()->delete();
        $bogi->delete();

        return back();
    }

    public function addTrain() {
        $stations = Station::all();
        return view('train.add', ['stations' => $stations]);
    }

    public function saveTrain(Request $request, FlasherInterface $flasher) {
        $request->validate([
            'name' => 'required',
            'home_station_id' => 'required|integer',
            'date' => 'required|date',
            'start_time' => 'required',
        ]);

        $train = new Train();
        $train->name = $request->name;
        $train->home_station_id = $request->home_station_id;
        $train->date = $request->date;
        $train->start_time = $request->start_time;

        $train->save();

        $flasher->addSuccess('Train added');

        return redirect(route('trains'));
    }

    public function addBogi(Request $request, $train_id) {
        $request->validate([
            'name' => 'required',
            'style' => 'required|integer',
        ]);

        $bogi = new Bogi();
        $bogi->name = $request->name;
        $bogi->style = $request->style;
        $bogi->train_id = $train_id;
        $bogi->save();

        if($bogi->style == 2) {
            $count = 15;
        } else {
            $count = 60;
        }


        for($i= 1; $i <= $count; $i++) {
            $seat = new Seat();
            $seat->name = $bogi->name . ' - ' . $i;
            $seat->train_id = $train_id;
            $seat->bogi_id = $bogi->id;

            $seat->save();
        }

        return back();
    }
}
