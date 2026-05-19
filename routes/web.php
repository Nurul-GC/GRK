<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Admin\DashboardController;

// ----------------------------------------------------
// Rotas de Autenticação Personalizadas (Visitantes apenas)
// ----------------------------------------------------
Route::middleware(['guest'])->group(function () {
    // O nome 'login' é CRÍTICO aqui. O Laravel usa esse nome para redirecionar acessos não autorizados.
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Rota de Logout (Apenas utilizadores autenticados podem deslogar)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
/**
 * Rotas Administrativas (Protegidas)
 * O middleware 'auth' barra utilizadores não logados e os redireciona para a página de login.
 */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Rota: /admin/dashboard -> Nome da rota: admin.dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reservas', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::patch('/reservas/{reservation}/status', [AdminReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    // Futuramente pode adicionar mais rotas de admin aqui:
    // Route::resource('pratos', AdminPratoController::class);
});

// Rota da Página Inicial (Home)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas do Menu (Cardápio)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show'); // Opcional

// Rotas de Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto', [ContactoController::class, 'enviarMensagem'])->name('contacto.enviar');

Route::get('/reserva', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserva', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reserva/sucesso', function () {
    return view('reservations.success');
})->name('reservations.success');
