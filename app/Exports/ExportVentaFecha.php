<?php

namespace App\Exports;


use Carbon\Carbon;
use App\Models\Cash;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportVentaFecha implements FromView, ShouldAutoSize
{
    public $cantidad_registros= 50;
    public $efectivo = 0;
    public $tarjeta  = 0;
    public $transferencia = 0;
    public $cheque = 0;
    public $deposito = 0;
    public $total = 0;
    public $venta = 0;
    public $abono = 0;
    public $cantidad = 0;
    public $desde, $hasta;
    protected $registros;

    public function __construct($desde, $hasta)
    {
       
        $this->desde = $desde;
        $this->hasta = $hasta;
    }
 
    public function view():View
    {
      
        if($this->desde != '' && $this->hasta != ''){
            $data = Cash::whereBetween('created_at', [$this->desde, $this->hasta]);

            $ventas = $data->paginate($this->cantidad_registros); //Pagina la busqueda
            $movimientos = $data->get();  //obtiene todos los resultados para realizar los calculos.
            foreach($movimientos as $movimiento)
            {
                $this->calcularpagos($movimiento);
            }

        }else{
          
            $ventas = '';
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

        return view('livewire.reporte.export.dia', compact('cantidad_registros', 'ventas', 'cantidad','venta', 'abono',  'efectivo', 'tarjeta', 'transferencia', 'cheque', 'deposito', 'total' ));
    }

    public function calcularpagos($dato)
    {


        if($dato->cashesable->payment_method == '1'){
            $this->efectivo = $this->efectivo + $dato->quantity;
        }

        if($dato->cashesable->payment_method == '2'){
            $this->tarjeta = $this->tarjeta + $dato->quantity;
        }

        if($dato->cashesable->payment_method == '3'){
            $this->transferencia = $this->transferencia + $dato->quantity;
        }

        if($dato->cashesable->payment_method == '4'){
            $this->cheque = $this->cheque + $dato->quantity;
        }

        if($dato->cashesable->payment_method == '5'){
            $this->deposito = $this->deposito + $dato->quantity;
        }

        /* resultados por tipo venta o abonos */

        if($dato->cashesable_type == 'App\Models\Sale'){
            $this->venta = $this->venta + $dato->quantity;
        }else{
            $this->abono = $this->abono + $dato->quantity;
        }



        $this->cantidad = $this->cantidad + 1;

        $this->total = $this->total + $dato->quantity;
    }
}
