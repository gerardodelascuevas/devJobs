<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{


    public function render()
    {
        if (!auth()->user()) {
            return redirect('login');
        }
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }

    // public function mostrarAlerta($vacanteId)
    // {
    //     // Aquí puedes realizar las acciones que necesites antes de mostrar la alerta

    //     $this->dispatchBrowserEvent('mostrarAlerta', [
    //         'title' => '¿Estás seguro?',
    //         'text' => '¡No podrás revertir esto!',
    //         'icon' => 'warning',
    //         'showCancelButton' => true,
    //         'confirmButtonColor' => '#d33',
    //         'cancelButtonColor' => '#3085d6',
    //         'confirmButtonText' => 'Sí, eliminarlo',
    //         'vacanteId' => $vacanteId,
    //     ]);

    // }
    #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }

}

