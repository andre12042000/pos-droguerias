<?php

namespace App\Http\Livewire\Presentacion;

use App\Models\Presentacion;
use Livewire\Component;

class CreateComponent extends Component
{
    public $name, $selected_id;
    public $status = 'ACTIVE';
    public $disponible_caja, $disponible_blister, $disponible_unidad, $por_caja, $por_blister, $por_unidad;

    protected $listeners = ['PresentacionEvent'];

    public function PresentacionEvent($presentacion)
    {
        $this->selected_id              = $presentacion['id'];
        $this->name                     = $presentacion['name'];
        $this->por_caja                 = $presentacion['por_caja'];
        $this->por_blister              = $presentacion['por_blister'];
        $this->por_unidad               = $presentacion['por_unidad'];
        $this->status               = $presentacion['status'];

    }
    protected $rules = [
        'name'                  =>  'required|min:4|max:254|unique:presentacions,name',

    ];

    protected $messages = [
        'name.required'                 => 'Este campo es requerido',
        'name.min'                      => 'Este campo requiere al menos 4 caracteres',
        'name.max'                      => 'Este campo no puede superar los 254 caracteres',
        'name.unique'                   => 'Este nombre ya ha sido registrado',

    ];

    public function render()
    {
        return view('livewire.presentacion.create-component');
    }

    public function storeOrupdate()
    {
        if($this->selected_id > 0){
            $this->update();
        }else{
            $this->save();
        }
        $this->emit('reloadpresentaciones');
    }

    public function save()
    {

        $validatedData = $this->validate();


         Presentacion::create([
            'name'                  => mb_strtoupper($this->name),
            'por_caja'              => $this->por_caja,
            'por_blister'           => $this->por_blister,
            'por_unidad'            => $this->por_unidad,
            'status'                => $this->status,
        ]);

        $this->cancel();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert');
        session()->flash('message', 'Presentación  creado exitosamente');
    }

    public function update()
    {
      $this->validate([
        'name'       =>  'required|min:4|max:254|unique:presentacions,name,' . $this->selected_id,
      ]);

        $presentacion = Presentacion::find($this->selected_id);

        $presentacion->update([
            'name'                  => mb_strtoupper($this->name),

            'por_caja'              => $this->por_caja,
            'por_blister'           => $this->por_blister,
            'por_unidad'            => $this->por_unidad,
            'status'                => $this->status,
        ]);
        $this->cancel();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert');
    }

    public function cancel()
    {
            $this->reset();
            $this->resetErrorBag();
    }
}
