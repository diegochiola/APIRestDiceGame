<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;


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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Rutas accesibles sin registro:
Route::post('/register', [UserController::class,'register']); //registrarse
Route::post('/login', [UserController::class,'login']); //iniciar sesión

//Rutas accesibles con registro
Route::middleware('auth:api')->group(function () {
    Route::put('/players/{id}', [UserController::class, 'updateName']); //modificar usuario
    Route::post('/logout', [UserController::class, 'logout']); //cerrar sesión 
});

// Rutas para jugadores
Route::middleware(['auth:api', 'role:player'])->group(function () { 
    Route::post('/players/{id}/games', [GameController::class, 'createGame']); //crear juego
    Route::get('/players/{id}/games', [GameController::class, 'getGames']); //mostrar juegos
    Route::delete('/players/{id}/games', [GameController::class, 'destroyAllGames']); //eliminamos todos los juegos
    
});
// Rutas para administradores
Route::middleware(['auth:api', 'role:admin'])->group(function () {   
    Route::get('/players', [GameController::class, 'allUsersWinPercentage']); //todos los user con sus porcentajes
    Route::get('/players/ranking', [GameController::class, 'ranking']); //Ranking todos los usuarios
    Route::get('/players/ranking/winner', [GameController::class, 'winner']); //Ganadores
    Route::get('/players/ranking/loser', [GameController::class, 'loser']); //perdedores
});

