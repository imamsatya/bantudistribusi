<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabelController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/tes', function () {
//     return view('tes');
// });
Route::resource('', TabelController::class);
Route::post('x', [TabelController::class, 'import'])->name('x');

Route::get('/temp', [TabelController::class, 'getTemp']);