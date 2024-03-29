<?php

namespace App\Traits;

use App\Models\Empresa;
use App\Traits\ObtenerImpresora;

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;

trait ImprimirTrait
{
    use ObtenerImpresora;
    public function imprimirRecibo($reciboBody)
    {
        try {
            // Obtener la instancia de la empresa
            $empresa = Empresa::find(1);
            if (!$empresa) {
                throw new \Exception('No se encontró la empresa.');
            }

            // Obtener el nombre de la impresora
            $printerName = $this->obtenerImpresora();
            if (!$printerName) {
                throw new \Exception('No se encontró ninguna impresora disponible.');
            }

            // Conectar a la impresora
            $connector = new WindowsPrintConnector($printerName);
            $printer = new Printer($connector);

            // Cargar la imagen del recibo
            $rutaImagen = public_path('img/recibos.png');
            $escposResizedImg = EscposImage::load($rutaImagen);

            // Imprimir la imagen redimensionada
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->bitImage($escposResizedImg);
            $printer->text("\n");
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text(strtoupper($empresa->name) . "\n");
            $printer->text("NIT: " . $empresa->nit . "\n");
            $printer->text("Telefono: " . $empresa->telefono . "\n");
            $printer->text($empresa->email . "\n");
            $printer->text($empresa->direccion . "\n");
            $fechaHoraImpresion = date('Y-m-d H:i:s');
            $printer->text("Fecha y Hora de Impresión: " . $fechaHoraImpresion . "\n");
            $printer->text("Usuario: " . Auth::user()->name . "\n");
            $printer->text("\n");
            $printer->text("\n");

            // Imprimir el cuerpo del recibo
            foreach ($reciboBody as $item) {
                $printer->text($item['label'] . "  " . $item['value'] . "\n");
            }

            $printer->text("--------------------------------\n");

            $printer->cut();
            $printer->close();
        } catch (\Exception $e) {
            dd($e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }


}










