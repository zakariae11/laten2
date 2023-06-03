<?php

use App\Http\Controllers\ClientInformationsController;
use App\Http\Controllers\ContratAcController;
use App\Http\Controllers\ContratController;
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

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\EntitySocialController;
use App\Http\Controllers\EntityPhysiqueController;

Route::resource('entite_social', EntitySocialController::class);
Route::resource('entite_physique', EntityPhysiqueController::class);
Route::get('/entite_physique/{id}/details', [EntityPhysiqueController::class, 'showDetails'])->name('entite_physique.details');


//Client Informations
Route::get('/clientInfos', [ClientInformationsController::class, 'clientInformations'])->name('clientInfos');
Route::get('/increaseRemise/{id}', [ClientInformationsController::class, 'updateArticlesDiscount'])->name("increaseRemise"); 


//Lister Contrat AC
Route::get('/listercontrat', [ContratAcController::class, 'listerContratAC'])->name('contrats');
Route::get('/suppcontrat', [ContratAcController::class, 'suppContrat']);
