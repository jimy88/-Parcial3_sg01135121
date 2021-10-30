@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }}</strong> </h5>
				</br>
				<hr>

			<div class="row w-100">


					<div class="col-md-3">
						<div class="p-3 card border-warning mx-sm-1">
							<div class="p-3 card border-warning text-warning my-card" ><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="mt-3 text-center text-warning"><h4>Usuarios</h4></div>
							<div class="mt-2 text-center text-warning"><h1>{{ Auth::user()->count() }}</h1></div>
						</div>
					</div>
				 </div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
