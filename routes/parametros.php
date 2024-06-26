<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Parametros\BrandController;
use App\Http\Controllers\Parametros\CategoryController;
use App\Http\Livewire\Presentacion\ListComponent;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use App\Http\Livewire\Parametros\SitiosTemperatura\ListSitioTemperaturaComponent;


Route::middleware([ PermissionMiddleware::class.':Acceso Parametros'])->group(function () {

    Route::get('eliminar', [CategoryController::class, 'destroy'])->name('destroycategory');
    Route::get('categorias', [CategoryController::class, 'index'])->name('category');
    Route::get('marcas', [BrandController::class, 'index'])->name('brand');

    Route::get('presentaciones', ListComponent::class)->name('presentaciones');
    Route::get('laboratorios', [\App\Http\Livewire\Laboratorio\ListComponent::class, '__invoke'])->name('laboratorios');
    Route::get('subacateogoria', [\App\Http\Livewire\Subcategoria\ListComponent::class, '__invoke'])->name('subcategoria');
    Route::get('ubicacion', [\App\Http\Livewire\Ubicacion\ListComponent::class, '__invoke'])->name('ubicacion');
    Route::get('motivo-anulacion', [\App\Http\Livewire\Anulacion\ListComponent::class, '__invoke'])->name('motivoanulacion');
    Route::get('sitios_temperatura', [ListSitioTemperaturaComponent::class, '__invoke'])->middleware('auth')->name('sitios.temperatura');
    Route::get('categoria_gastos', [\App\Http\Livewire\Parametros\CategoriaGastos\ListComponent::class, '__invoke'])->name('categoriagastos');
    Route::get('metodo_pago', [\App\Http\Livewire\Parametros\MetodosPago\ListComponent::class, '__invoke'])->name('metodos');


});
