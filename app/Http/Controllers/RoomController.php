<?php

namespace App\Http\Controllers;

use App\Models\Models\Room as ModelsRoom;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // Mengubah kondisi where untuk kolom 'status'
        $rooms = ModelsRoom::where('status', 'available')->get();
        return view('rooms.index', compact('rooms'));
    }
}
    

