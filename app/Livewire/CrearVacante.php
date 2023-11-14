<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo'=> 'required|string',
        'salario'=> 'required',
        'categoria'=> 'required',
        'empresa'=> 'required',
        'dia'=> 'required',
        'descripcion'=> 'required',
        'imagen'=> 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();
        //GUARDAR IMAGEN
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //CREAR VACANTE
        Vacante::create([
            'titulo'=> $datos['titulo'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'dia'=> $datos['dia'],
            'descripcion'=> $datos['descripcion'],
            'imagen'=> $datos['imagen'],
            'user_id'=> auth()->user()->id,
        ]);

        //CREAR MENSAJE DE EXITO
        session()->flash('mensaje', 'Vacante creada correctamente');

        //REDIRECT
        return redirect()->route('vacantes.dashboard');
    }

    public function render()
    {

        //CONSULTA BASE DE DATOS-->
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios'=> $salarios,
            'categorias'=> $categorias,
        ]);
    }
}
