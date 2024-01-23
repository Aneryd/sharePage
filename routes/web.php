<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [MainController::class, "index"]);
Route::post("/secret", [UserController::class, "secret"]); 
Route::middleware('secret')->group(function () {
    Route::get("profile/{id}", [UserController::class, "show"]);
});

require __DIR__.'/auth.php';
