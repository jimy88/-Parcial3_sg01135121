<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nota;

class Notas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nota1, $nota2, $nota3, $nota4, $promedio, $parcial, $alumno_id, $curso_id, $profesor_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.notas.view', [
            'notas' => Nota::latest()
						->orWhere('nota1', 'LIKE', $keyWord)
						->orWhere('nota2', 'LIKE', $keyWord)
						->orWhere('nota3', 'LIKE', $keyWord)
						->orWhere('nota4', 'LIKE', $keyWord)
						->orWhere('promedio', 'LIKE', $keyWord)
						->orWhere('parcial', 'LIKE', $keyWord)
						->orWhere('alumno_id', 'LIKE', $keyWord)
						->orWhere('curso_id', 'LIKE', $keyWord)
						->orWhere('profesor_id', 'LIKE', $keyWord)
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
		$this->nota1 = null;
		$this->nota2 = null;
		$this->nota3 = null;
		$this->nota4 = null;
		$this->promedio = null;
		$this->parcial = null;
		$this->alumno_id = null;
		$this->curso_id = null;
		$this->profesor_id = null;
    }

    public function store()
    {
        $this->validate([
		'nota1' => 'required',
		'nota2' => 'required',
		'nota3' => 'required',
		'nota4' => 'required',
		'promedio' => 'required',
		'parcial' => 'required',
		'alumno_id' => 'required',
		'curso_id' => 'required',
		'profesor_id' => 'required',
        ]);

        Nota::create([ 
			'nota1' => $this-> nota1,
			'nota2' => $this-> nota2,
			'nota3' => $this-> nota3,
			'nota4' => $this-> nota4,
			'promedio' => $this-> promedio,
			'parcial' => $this-> parcial,
			'alumno_id' => $this-> alumno_id,
			'curso_id' => $this-> curso_id,
			'profesor_id' => $this-> profesor_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Nota Successfully created.');
    }

    public function edit($id)
    {
        $record = Nota::findOrFail($id);

        $this->selected_id = $id; 
		$this->nota1 = $record-> nota1;
		$this->nota2 = $record-> nota2;
		$this->nota3 = $record-> nota3;
		$this->nota4 = $record-> nota4;
		$this->promedio = $record-> promedio;
		$this->parcial = $record-> parcial;
		$this->alumno_id = $record-> alumno_id;
		$this->curso_id = $record-> curso_id;
		$this->profesor_id = $record-> profesor_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nota1' => 'required',
		'nota2' => 'required',
		'nota3' => 'required',
		'nota4' => 'required',
		'promedio' => 'required',
		'parcial' => 'required',
		'alumno_id' => 'required',
		'curso_id' => 'required',
		'profesor_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nota::find($this->selected_id);
            $record->update([ 
			'nota1' => $this-> nota1,
			'nota2' => $this-> nota2,
			'nota3' => $this-> nota3,
			'nota4' => $this-> nota4,
			'promedio' => $this-> promedio,
			'parcial' => $this-> parcial,
			'alumno_id' => $this-> alumno_id,
			'curso_id' => $this-> curso_id,
			'profesor_id' => $this-> profesor_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Nota Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Nota::where('id', $id);
            $record->delete();
        }
    }
}
