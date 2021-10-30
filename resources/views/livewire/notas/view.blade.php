@section('title', __('Notas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							LIstado de  Notas  </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Notas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Notas
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.notas.create')
						@include('livewire.notas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nota1</th>
								<th>Nota2</th>
								<th>Nota3</th>
								<th>Nota4</th>
								<th>Promedio</th>
								<th>Parcial</th>
								<th>Alumno Id</th>
								<th>Curso Id</th>
								<th>Profesor Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($notas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nota1 }}</td>
								<td>{{ $row->nota2 }}</td>
								<td>{{ $row->nota3 }}</td>
								<td>{{ $row->nota4 }}</td>
								<td>{{ $row->promedio }}</td>
								<td>{{ $row->parcial }}</td>
								<td>{{ $row->alumno_id }}</td>
								<td>{{ $row->curso_id }}</td>
								<td>{{ $row->profesor_id }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Nota id {{$row->id}}? \nDeleted Notas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $notas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
