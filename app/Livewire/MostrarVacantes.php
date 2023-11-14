<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    {

        if(!auth()->user()){
            return redirect('login');
        }
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes'=> $vacantes
        ]);
    }

//     public function emit($vacanteId)
// {
//     // Aquí puedes realizar las acciones que necesites antes de mostrar la alerta

//     $this->emit('mostrarAlerta', $vacanteId);
// }

}
