<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register/step1', [RegisterController::class, 'user']);
Route::post('/register/step1', [RegisterController::class, 'userRegister']);

Route::get('/register/step2', [RegisterController::class, 'weight']);
Route::post('/register/step2', [RegisterController::class, 'weightRegister']);

Route::get('/weight_logs', [AdminController::class, 'index'])->middleware('auth');
Route::get('/weight_logs/search', [AdminController::class, 'search']);

Route::get('/weight_logs/goal_setting', [AdminController::class, 'setting']);
Route::patch('/weight_logs/goal_setting', [AdminController::class, 'targetUpdate']);
Route::post('weight_logs/create', [AdminController::class, 'store']);
Route::get('/weight_logs/{weightLogId}', [AdminController::class, 'detail']);
Route::patch('/weight_logs/{weightLogId}/update', [AdminController::class, 'update']);
Route::delete('/weight_logs/{weightLogId}/delete', [AdminController::class, 'destroy']);

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
});