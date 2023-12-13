<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ParcoursScolaireController;
use App\Http\Controllers\EnqueteSocialeController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\DossierOrangeController;
use App\Http\Controllers\DossierMedicalController;
use App\Http\Controllers\InfractionController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\RegistreJournalierController;
use App\Http\Controllers\DashboardController;
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
    return view('auth.login');
});


Route::get('/kenza', function () {
    return view('Demande.All');
});

Route::get('/hamza', function () {
    return view('auth.sign-up');
});

Route::get('/home', function () {
    return view('Demande.All');
});

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//index qui retoure une seule enquete sociale
Route::get('/index_un/{id_demande}', [EnqueteSocialeController::class, 'index_un'])->name('index_un');

//accepter
Route::post('/accepter/{id}', [DemandeController::class, 'accepter'])->name('accepter');

//refuser
Route::post('/refuser/{id}', [DemandeController::class, 'refuser'])->name('refuser');

//Demande
Route::resource('demande', DemandeController::class);

//Beneficiaire
Route::resource('beneficiaire', BeneficiaireController::class);

//authentification
Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

//EnqueteSociale
Route::resource('enqueteSociale', EnqueteSocialeController::class);

//User
Route::resource('utilisateur', UtilisateurController::class);

//parcours
Route::resource('parcours', ParcoursScolaireController::class);

//Dossier orange
Route::resource('dossierOrange', DossierOrangeController::class);

//Infraction
Route::resource('infraction', InfractionController::class);

Route::get('/create/{id_benef}', [InfractionController::class, 'create'])->name('create');

//visite
Route::resource('visite', VisiteController::class);

Route::get('/crea/{id_benef}', [VisiteController::class, 'crea'])->name('crea');

//Dossier medical
Route::resource('dossierMedical', DossierMedicalController::class);

//Registre Journalier
Route::resource('registreJournalier', RegistreJournalierController::class);

Route::get('/creat/{id_benef}', [RegistreJournalierController::class, 'creat'])->name('creat');

//Parcours Scolaire
Route::resource('parcoursScolaire', ParcoursScolaireController::class);

Route::get('/creates/{id_benef}', [ParcoursScolaireController::class, 'creates'])->name('creates');

//pdf demande
Route::get('/Demande/{id_demande}', [DemandeController::class, 'pdf'])->name('pdf');
