<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/torneo', [TournamentController::class, 'showForm'])->name('torneo.form');
Route::post('/torneo/simulate', [TournamentController::class, 'tournamentoSimulate'])->name('torneo.simulate');
Route::put('/torneo/update/{gender}', [TournamentController::class, 'updatePlayers'])->name('torneo.updatePlayers');
Route::get('/torneo/historicos', [TournamentController::class, 'showHistoricos'])->name('torneo.historicos');
Route::get('/torneo/detalle/{id}', [TournamentController::class, 'showDetalle'])->name('torneo.detalle');