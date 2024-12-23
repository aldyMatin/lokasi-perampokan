<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
 return redirect()->route('incidents.index'); // Alihkan ke halaman daftar kejadian
});

Route::resource('incidents', IncidentController::class);
