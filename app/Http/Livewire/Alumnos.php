<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alumno;

class Alumnos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellido, $fechaDeNacimiento, $direccion, $genero, $telefono, $correo, $clave;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alumnos.view', [
            'alumnos' => Alumno::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('fechaDeNacimiento', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('genero', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('clave', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellido = null;
		$this->fechaDeNacimiento = null;
		$this->direccion = null;
		$this->genero = null;
		$this->telefono = null;
		$this->correo = null;
		$this->clave = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'fechaDeNacimiento' => 'required',
		'direccion' => 'required',
		'genero' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'clave' => 'required',
        ]);

        Alumno::create([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'fechaDeNacimiento' => $this-> fechaDeNacimiento,
			'direccion' => $this-> direccion,
			'genero' => $this-> genero,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'clave' => $this-> clave
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alumno Successfully created.');
    }

    public function edit($id)
    {
        $record = Alumno::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->fechaDeNacimiento = $record-> fechaDeNacimiento;
		$this->direccion = $record-> direccion;
		$this->genero = $record-> genero;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		$this->clave = $record-> clave;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'fechaDeNacimiento' => 'required',
		'direccion' => 'required',
		'genero' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'clave' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alumno::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'fechaDeNacimiento' => $this-> fechaDeNacimiento,
			'direccion' => $this-> direccion,
			'genero' => $this-> genero,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'clave' => $this-> clave
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alumno Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alumno::where('id', $id);
            $record->delete();
        }
    }
}
