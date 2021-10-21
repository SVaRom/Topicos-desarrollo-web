<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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
Route::post('/student', [StudentController::class, 'index']);
Route::post('/studentStore', [StudentController::class, 'store']);
Route::get('/studentToken', [StudentController::class, 'showToken']);
Route::post('/studentUpdate', [StudentController::class, 'update']);
Route::post('/studentDestroy', [StudentController::class, 'destroy']);
