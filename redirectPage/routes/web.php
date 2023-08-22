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

Route::get('/{slug}', function ($slug) {

  if(is_numeric(substr($slug, 0, 1))){
    $chunks = config('constants.chunks');
    $key = (int)(substr($slug, 0, 1));
    $entity = "App\Models\\" . $chunks[$key] . 'link';
    $model = new $entity();
    $g = $model::where('slug', $slug)->pluck('link')->first();
    if (! $g) {
      abort(404);
  }
  }else{
    $g = Link::where('slug', $slug)->pluck('link')->first();
    if (! $g) {
      abort(404);
  }
  }

  return redirect()->away($g);

});
