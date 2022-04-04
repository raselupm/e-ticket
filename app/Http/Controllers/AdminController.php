<?php

namespace App\Http\Controllers;

use App\Models\Bogi;
use App\Models\Train;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }

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


}
