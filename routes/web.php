<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\Parametros\CategoryController;
use App\Http\Livewire\Notification\NotificationComponent;
use App\Http\Controllers\NombreDeTuControlador;
use App\Http\Controllers\CorregirIvasController;
use App\Http\Controllers\PagoCreditoController;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;

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
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return redirect('/login');
    }
});


Auth::routes([
    'register' => false
]);

Route::get('eliminar', [CategoryController::class, 'destroy'])->middleware('auth', 'change.password')->name('destroycategory');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth', 'change.password')->name('home');
Route::post('/estadisticas', [App\Http\Controllers\HomeController::class, 'actilizarestadisticas'])->middleware('auth', 'change.password')->name('update.estadistica');

Route::get('notificaciones/', NotificationComponent::class)->middleware('auth')->name('notificaciones.index');
Route::get('notifications/get', [App\Http\Controllers\NotificationsController::class, 'getNotificationsData'])->middleware('auth', 'change.password')->name('notifications.get');

Route::post('/mark-as-read', [App\Http\Controllers\NotificationsController::class, 'markNotification'])->middleware('auth', 'change.password')->name('markNotification');

Route::get('markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->middleware('auth', 'change.password')->name('markAsRead');
Route::get('perfil', [PerfilController::class, 'index'])->middleware('auth')->name('perfil');

Route::get('creditos/pago/detalles/{recibo}', [PagoCreditoController::class, 'show'])->middleware('auth')->name('detalle.pagocredito');

Route::get('/obtener-informacion-cliente', [NombreDeTuControlador::class, 'obtenerInformacionCliente']);

Route::get('/corregir_ivas', [CorregirIvasController::class, 'index']);
