<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Cash;
use App\Models\Sale;
use App\Models\MetodoPago;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExportVentaDiaria implements FromView, ShouldAutoSize
{
    public $cantidad_registros = 50;
    public $efectivo = 0;
    public $tarjeta  = 0;
    public $transferencia = 0;
    public $cheque = 0;
    public $deposito = 0;
    public $total = 0;
    public $venta = 0;
    public $abono = 0;
    public $totalAnulado = 0;
    public $sumatoriasMetodosPago = [];
    public $cantidad = 0;
    public function view(): View
    {
        $hoy = Carbon::now();
        $hoy = $hoy->format('Y-m-d');
        $this->ventaanuladas();
        $data = Cash::whereDate('created_at', $hoy)->with('cashesable');
        $ventas = $data->paginate($this->cantidad_registros); //Pagina la busqueda
        $movimientos = $data->get(); //obtiene todos los resultados para realizar los calculos.
        foreach ($movimientos as $movimiento) {
            $this->calcularpagos($movimiento);
        }
        $cantidad = $this->cantidad;
        $tarjeta  = $this->tarjeta;
        $efectivo = $this->efectivo;
        $transferencia = $this->transferencia;
        $cheque = $this->cheque;
        $deposito = $this->deposito;
        $total = $this->total;
        $venta = $this->venta;
        $abono = $this->abono;
        $cantidad_registros = $this->cantidad_registros;
        $sumatoriasMetodosPago = $this->sumatoriasMetodosPago;
        $vendedor = $this->obtenerSumatoriaPorUsuario();
        $totalAnulado = $this->totalAnulado;


        return view('livewire.reporte.export.dia', compact('totalAnulado', 'vendedor', 'sumatoriasMetodosPago', 'cantidad_registros', 'hoy', 'ventas', 'cantidad', 'venta', 'abono',  'efectivo', 'tarjeta', 'transferencia', 'cheque', 'deposito', 'total'));
    }
    public function calcularpagos($dato)
    {


        // Obtener métodos de pago
        $metodosDePago = $this->obtenermetodosdepago();

        // Si el array $this->sumatoriasMetodosPago está vacío, inicializarlo
        if (empty($this->sumatoriasMetodosPago)) {
            foreach ($metodosDePago as $metodo) {
                $this->sumatoriasMetodosPago[$metodo->name] = 0;
            }
        }

        // Obtener el ID y nombre del método de pago del objeto $dato (ajusta según la estructura de tus datos)
        $metodoPagoId = $dato->cashesable->metodo_pago_id;
        $nombreMetodo = $metodosDePago->where('id', $metodoPagoId)->first()->name;

        // Validar si el método de pago es válido
        if (isset($this->sumatoriasMetodosPago[$nombreMetodo])) {
            // Actualizar la sumatoria para el método de pago correspondiente
            $this->sumatoriasMetodosPago[$nombreMetodo] += $dato->quantity;
        }

        /* resultados por tipo venta o abonos */
        if ($dato->cashesable_type == 'App\Models\Sale') {
            $this->venta = $this->venta + $dato->quantity;
        } else {
            $this->abono = $this->abono + $dato->quantity;
        }

        $this->cantidad = $this->cantidad + 1;
        $this->total = $this->total + $dato->quantity;
        // Ahora puedes pasar $this->sumatoriasMetodosPago a tu vista para mostrar las sumatorias y nombres de los métodos de pago

    }

    public function obtenerSumatoriaPorUsuario()
    {
        $resultados = Cash::select('user_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereDate('created_at', now()->toDateString()) // Filtrar por transacciones creadas hoy
            ->groupBy('user_id')
            ->get();

        return $resultados;
    }

    public function ventaanuladas()
    {
        $fechaActual = Carbon::now()->toDateString();

        $this->totalAnulado = Sale::where('status', 'ANULADA')
            ->whereDate('sale_date', $fechaActual)
            ->sum('valor_anulado');
    }

    public function obtenermetodosdepago()
    {

        $metodos = MetodoPago::where('status', 'ACTIVE')->get();
        return $metodos;
    }
}
