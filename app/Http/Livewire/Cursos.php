<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;

class Cursos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombrecurso, $año, $ciclo, $profesor_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cursos.view', [
            'cursos' => Curso::latest()
						->orWhere('nombrecurso', 'LIKE', $keyWord)
						->orWhere('año', 'LIKE', $keyWord)
						->orWhere('ciclo', 'LIKE', $keyWord)
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
		$this->nombrecurso = null;
		$this->año = null;
		$this->ciclo = null;
		$this->profesor_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombrecurso' => 'required',
		'año' => 'required',
		'ciclo' => 'required',
		'profesor_id' => 'required',
        ]);

        Curso::create([ 
			'nombrecurso' => $this-> nombrecurso,
			'año' => $this-> año,
			'ciclo' => $this-> ciclo,
			'profesor_id' => $this-> profesor_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Curso Successfully created.');
    }

    public function edit($id)
    {
        $record = Curso::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombrecurso = $record-> nombrecurso;
		$this->año = $record-> año;
		$this->ciclo = $record-> ciclo;
		$this->profesor_id = $record-> profesor_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombrecurso' => 'required',
		'año' => 'required',
		'ciclo' => 'required',
		'profesor_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Curso::find($this->selected_id);
            $record->update([ 
			'nombrecurso' => $this-> nombrecurso,
			'año' => $this-> año,
			'ciclo' => $this-> ciclo,
			'profesor_id' => $this-> profesor_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Curso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Curso::where('id', $id);
            $record->delete();
        }
    }
}
