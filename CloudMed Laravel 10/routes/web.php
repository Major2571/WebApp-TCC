<?php

use App\Http\Controllers\ExamesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacinasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\UserDetailsMedicalController;
use App\Http\Controllers\CartaoSusController;
use App\Http\Controllers\CartaoConvenioController;
use App\Http\Controllers\InformacoesClinicasController;
use App\Models\UserDetails;
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
    return view('index');
});

Route::get('/funcionalidades', function () {
    return view('funcionalidades');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/login-userCloud', function () {
    return view('login-userCloud');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/clinical-details', [UserDetailsMedicalController::class, 'index'])->name('userDetailsMedical');

    Route::get('/editar-sus', [CartaoSusController::class, 'create'])->name('sus.create');
    Route::post('/editar-sus', [CartaoSusController::class, 'store'])->name('sus.store');

    Route::get('/editar-convenio', [CartaoConvenioController::class, 'create'])->name('convenio.create');
    Route::post('/editar-convenio', [CartaoConvenioController::class, 'store'])->name('convenio.store');

    Route::post('/editar-info-clinica', [InformacoesClinicasController::class, 'store'])->name('infoClinica.store');
    Route::post('/editar-info-clinica/update/{id}', [InformacoesClinicasController::class, 'update'])->name('infoClinica.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/meus-exames', [ExamesController::class, 'index'])->name('meusExames');
    Route::get('/cad-novo-exame', [ExamesController::class, 'create'])->name('novoCadExame');
    Route::post('/cad-novo-exame', [ExamesController::class, 'store'])->name('saveNewExam');
    Route::get('/meus-exames/delete/{id}',  [ExamesController::class, 'destroy'])->name('deleteExame');
    Route::get('/meus-exames/edit/{id}',  [ExamesController::class, 'edit'])->name('editExames');
    Route::put('/meus-exames/update/{id}',  [ExamesController::class, 'update'])->name('updateExames');
    
    Route::get('/minhas-vacinas', [VacinasController::class, 'index'])->name('minhasVacinas');
    Route::get('/cad-novo-vacina', [VacinasController::class, 'create'])->name('novoCadVacina');
    Route::post('/cad-novo-vacina', [VacinasController::class, 'store'])->name('saveNewVaccine');
    Route::get('/minhas-vacinas/delete/{id}',  [VacinasController::class, 'destroy'])->name('deleteVacina');
    Route::get('/minhas-vacinas/edit/{id}',  [VacinasController::class, 'edit'])->name('editVacina');
    Route::put('/minhas-vacinas/update/{id}',  [VacinasController::class, 'update'])->name('updateVacina');
    
    Route::get('/profile', [UserDetailsController::class, 'index'])->name('profile');
    Route::get('/profile-update', [UserDetailsController::class, 'create'])->name('profile.create');
    Route::post('/profile-update', [UserDetailsController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit/{id}', [UserDetailsController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [UserDetailsController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


});



require __DIR__ . '/auth.php';
