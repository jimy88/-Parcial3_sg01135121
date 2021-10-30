<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Profesor;

class Profesors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellido, $dui, $telefono, $email, $clave;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profesors.view', [
            'profesors' => Profesor::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('dui', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
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
		$this->dui = null;
		$this->telefono = null;
		$this->email = null;
		$this->clave = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'dui' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'clave' => 'required',
        ]);

        Profesor::create([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'dui' => $this-> dui,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'clave' => $this-> clave
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Profesor Successfully created.');
    }

    public function edit($id)
    {
        $record = Profesor::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->dui = $record-> dui;
		$this->telefono = $record-> telefono;
		$this->email = $record-> email;
		$this->clave = $record-> clave;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'dui' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'clave' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Profesor::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'dui' => $this-> dui,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'clave' => $this-> clave
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Profesor Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Profesor::where('id', $id);
            $record->delete();
        }
    }
}
