<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $dia;
    public $descripcion;
    public $imagen;
    public $imagenNueva;

    use WithFileUploads;

    protected $rules = [
        'titulo'=> 'required|string',
        'salario'=> 'required',
        'categoria'=> 'required',
        'empresa'=> 'required',
        'dia'=> 'required',
        'descripcion'=> 'required',
        'imagenNueva'=> 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->dia = Carbon::parse($vacante->dia)->format('y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;


    }

    public function editarVacante()
    {
        $datos = $this->validate();

        //EXISTE NUEVA IMAGEN
        if($this->imagenNueva){
            $imagen = $this->imagenNueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes', '', $imagen);
         }
        //ENCONTRAR VACANTE
        $vacante = Vacante::find($this->vacante_id);
        //REASIGNAR VALORES
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->dia = $datos['dia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        //GUARDAR VALORES
        $vacante->save();
        //REDIRECCIONAR
        session()->flash('mensaje', 'La vacante se actualizo correctamente');

        return redirect()->route('vacantes.dashboard');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias= Categoria::all();


        return view('livewire.editar-vacante', [
            'salarios'=> $salarios,
            'categorias'=> $categorias,
        ]);
    }
}
