<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/usuarios/{id}',[ApiController::class,'users']);
Route::get('/usuarios',[ApiController::class,'users']);
Route::post('/login',[ApiController::class,'login']);
Route::post('/registro',[ApiController::class,'registro']);
Route::get('/roles',[ApiController::class,'roles']);
Route::get('/locaciones',[ApiController::class,'locations']);

// configuracion en la ruta para poder presentar la imagen al front
Route::get('/resources/img/{image}', function ($imageName) {
    $imagePath = public_path('resources/img/' . $imageName);

    if (File::exists($imagePath)) {
        return response()->file($imagePath);
    } else {
        abort(404);
    }
});










