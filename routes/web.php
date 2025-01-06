<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
        return view('welcome');
});

Route::get('/event', function () {
        return view('event');
});

Route::get('/update/{id}', function () {
        return view('update');
});




//====================================== Dashboard 
Route::get('/dashboard', function () {
        return view('dashboard.index');
})->name('dashboard.index');

Route::get('/insert', function () {
        return view('dashboard.insert');
})->name('insert');

Route::get('/updateLatihan/{id}', function () {
        return view('dashboard.updateLatihan');
});
Route::get('/showLatihan/{id}', function () {
        return view('dashboard.show');
});


// Route::get('/main', function () {
//     return view('main');
// });

// Route::get('/main', [DataController::class, 'data'])->name('main');
// Route::get('/getData', [DataController::class, 'getData'])->name('getData');
