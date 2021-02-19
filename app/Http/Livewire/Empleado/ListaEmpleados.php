<?php

namespace App\Http\Livewire\Empleado;

use Empleado;
use Livewire\Component;

class ListaEmpleados extends Component
{
    private $empleados;

    public function mount()
    {
        $this->empleados = Empleado::orderBy('apellido', 'ASC')->paginate(10);;
    }

    public function render()
    {
        return view('livewire.empleado.lista-empleados', [
            'empleados' => $this->empleados
        ]);
    }
}
