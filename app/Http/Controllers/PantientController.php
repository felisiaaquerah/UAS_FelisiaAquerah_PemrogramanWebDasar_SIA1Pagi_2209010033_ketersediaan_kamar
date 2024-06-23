<?php

namespace App\Http\Controllers;

use App\Models\Models\Patients;
use App\Models\Models\Room as ModelsRoom;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function admitForm()
    {
        $availableRooms = ModelsRoom::where('is_available', true)->get();
        return view('patients.admit', compact('availableRooms'));
    }

    public function admit(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Membuat pasien baru
        $patient = new Patients($request->all());
        $patient->save();

        // Update status kamar
        $room = ModelsRoom::find($request->room_id);
        $room->is_available = false;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Pasien berhasil masuk.');
    }

    public function discharge(Patients $patient)
    {
        // Update status kamar
        $room = $patient->room;
        $room->is_available = true;
        $room->save();

        // Update tanggal keluar pasien
        $patient->discharge_date = now();
        $patient->save();

        return redirect()->route('rooms.index')->with('success', 'Pasien berhasil keluar.');
    }
}