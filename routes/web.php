<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PatientController;

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/patients/admit', [PatientController::class, 'admitForm'])->name('patients.admitForm');
Route::post('/patients/admit', [PatientController::class, 'admit'])->name('patients.admit');
Route::post('/patients/discharge/{patient}', [PatientController::class, 'discharge'])->name('patients.discharge');