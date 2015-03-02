@extends('layouts.main')

@section('contenido')

<div class="row">
	<div class="jumbotron">
		<h1 class="text-center">Nuevo Role</h1>
	</div>
</div>

<div class="container">
	
	<!-- Aqui pondremos los mensajes que haya -->
<div class="row">
	<div class="col-md-6">
		@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{$message}}
				@endforeach
			</div>
		@endif
		@if (Session::has('message'))
    			<div class="alert alert-info col-md-offset-2">
    				{{ Session::get('message') }}
    			</div>
			@endif
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form">
			{{Form::open(['url' => 'roles'])}}
			<div class="form-group">
				{{Form::label('nombre', 'Nombre')}}
				{{Form::text('nombre', Input::old('nombre'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('descripcion', 'Descripción')}}
				{{Form::textarea('descripcion', Input::old('descripcion'),['class' => 'form-control'])}}
			</div>
			
			
			{{Form::submit('Guardar Rol', 
				['class' => 'btn btn-danger'])}}
			{{Form::close()}}
		</div>
	</div>
</div>

</div>

@stop