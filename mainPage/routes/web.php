<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [crudController::class, 'index'])->name('index');
Route::post('sc', [crudController::class, 'slugCreate'])->name('slugCreate');
Route::get('adminer', [crudController::class, 'adminer'])->name('adminer');

Auth::routes([
    'register' => false,
    'reset' => false,
]);
