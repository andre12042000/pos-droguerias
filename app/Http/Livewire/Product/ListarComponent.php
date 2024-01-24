<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Laboratorio;
use App\Models\OrdersDetails;
use App\Models\Presentacion;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;
use App\Models\Subcategoria;
use App\Models\Ubicacion;
use Livewire\Component;
use Livewire\WithPagination;

class ListarComponent extends Component
{
    public $products, $buscar, $filter_estado, $filter_category;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $cantidad_registros = 10;

    protected $listeners = ['ProductsEvent', 'reloadProductos'];

    public function ProductsEvent()
    {
        $this->products = Product::all();
    }

    public function sendData($product)
    {
        $this->emit('ProductEventEdit', $product);
    }

    public function reloadProductos()
    {
        $this->render();
    }

    public function render()
    {
        $productos= Product::search($this->buscar)
                            ->status($this->filter_estado)
                            ->orderBy('name', 'ASC')
                            ->orderBy('status', 'ASC')
                            ->paginate($this->cantidad_registros);

        $categorias     = Category::orderBy('name', 'ASC')->get();
        $subcategorias  = Subcategoria::orderBy('name', 'ASC')->get();
        $ubicaciones    = Ubicacion::orderBy('name', 'ASC')->get();
        $presentaciones  = Presentacion::orderBy('name', 'ASC')->get();
        $laboratorios  = Laboratorio::orderBy('name', 'ASC')->get();


        return view('livewire.product.listar-component', compact('laboratorios', 'productos', 'categorias', 'subcategorias', 'ubicaciones', 'presentaciones'));
    }

    public function destroy($id)
    {
        $orden      = OrdersDetails::where('product_id', $id)->first();
        $sales      = SaleDetail::where('product_id', $id)->first();
        $purchase   = PurchaseDetail::where('product_id', $id)->first();


        if($purchase  OR $orden OR $sales){
            session()->flash('warning', 'Producto esta siendo utilizado no se puede eliminar');
            $this->reloadProductos();
        }else{
            $product = Product::find($id);
            $product->delete();
            session()->flash('delete', 'Producto eliminado exitosamente');
            $this->reloadProductos();

        }
    }

    public function datomodal($product){
        $this->emit('ProductstockEventEdit', $product);

    }




    //Metodos necesarios para la usabilidad


    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }


    public function doAction($action)
    {
        $this->resetInput();
    }

    //método para reiniciar variables
    private function resetInput()
    {
        $this->reset();
    }
}
