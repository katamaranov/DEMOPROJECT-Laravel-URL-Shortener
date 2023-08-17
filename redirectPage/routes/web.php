<?php

use Illuminate\Support\Facades\Route;
use App\Models\Link;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::post('/{slug}', [redirectController::class, 'index'])->name('index');
Route::get('/{slug}', function (Link $slug) {

  return redirect()->away($slug->link);

});
