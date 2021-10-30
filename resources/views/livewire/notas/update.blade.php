<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="nota1"></label>
                <input wire:model="nota1" type="text" class="form-control" id="nota1" placeholder="Nota1">@error('nota1') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nota2"></label>
                <input wire:model="nota2" type="text" class="form-control" id="nota2" placeholder="Nota2">@error('nota2') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nota3"></label>
                <input wire:model="nota3" type="text" class="form-control" id="nota3" placeholder="Nota3">@error('nota3') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nota4"></label>
                <input wire:model="nota4" type="text" class="form-control" id="nota4" placeholder="Nota4">@error('nota4') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="promedio"></label>
                <input wire:model="promedio" type="text" class="form-control" id="promedio" placeholder="Promedio">@error('promedio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="parcial"></label>
                <input wire:model="parcial" type="text" class="form-control" id="parcial" placeholder="Parcial">@error('parcial') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alumno_id"></label>
                <input wire:model="alumno_id" type="text" class="form-control" id="alumno_id" placeholder="Alumno Id">@error('alumno_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="curso_id"></label>
                <input wire:model="curso_id" type="text" class="form-control" id="curso_id" placeholder="Curso Id">@error('curso_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="profesor_id"></label>
                <input wire:model="profesor_id" type="text" class="form-control" id="profesor_id" placeholder="Profesor Id">@error('profesor_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
