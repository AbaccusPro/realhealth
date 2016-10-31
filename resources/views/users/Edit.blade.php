@extends('layouts.Master')
@section('title') Edit User @stop

@section('head')
<script>
	$(document).ready(function() {
        $("[name='module']").bootstrapSwitch();
    });
</script>   
@stop

@section('body')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
				<div class="panel-heading"><h4>Edit User</h4></div>
				<div class="panel-body">
			{!!Form::model($usuario, ['url' => ['edit/user', $usuario->id],
				'files' => true, 'Method' => 'PUT',
			'class' => 'form-horizontal'])!!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4">First Name</label>
							<div class="col-md-6">
								{!!Form::text('first_name', $usuario->first_name, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 ">Middle Name</label>
							<div class="col-md-6">
								{!!Form::text('middle_name', $usuario->middle_name, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 ">Last Name</label>
							<div class="col-md-6">
								{!!Form::text('last_name', $usuario->last_name, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 ">Username</label>
							<div class="col-md-6">
								{!!Form::text('Username', $usuario->username, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 ">E-Mail</label>
							<div class="col-md-6">
								{!!Form::text('Email', $usuario->email, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Tipo', 'Tipo', ['class' => 'col-md-4 '])!!}
							<div class="col-md-6">
								{!!Form::select('Rol', $rol, $usuario->rol_id,
								['class' => 'chosen-select form-control'])!!}
							</div>
						</div>

						<div class="form-group">
						{!!Form::label('Imagen', 'Imagen de Perfil',
							 ['class' => 'col-sm-4'])!!}
							 <div class="col-sm-8">
							 <img src="data:image/$usuario->image->Mime;base64,{{chunk_split(base64_encode($usuario->image->File))}}"  width="15%" />
						{!!Form::file('image', null, ['id' => 'image', 'class' => 'chosen-select form-control'])!!}
							</div>

						<div class="form-group" style="margin-left: 30px">
						<h5>Modules</h5>
						<!-- esta evaluación es para ver si tienen habilitado el modulo y de ser asi es la manera en que se mostraran los checkbox -->
							@if ($usuario->nutrition == 1 || $usuario->therapy == 1)
								@if ($usuario->nutrition == 1)
									<label><input type="checkbox" name="module[0]" checked data-init-plugin="switchery" data-size="small" data-color="primary"> Nutrition</label><br>						
								@else
									<label><input type="checkbox" name="module[0]" data-init-plugin="switchery" data-size="small" data-color="primary"> Nutrition</label><br>
								@endif
								@if ($usuario->therapy == 1)
									<label><input type="checkbox" name="module[1]" checked data-init-plugin="switchery" data-size="small" data-color="primary"> Therapy</label><br>
								@else
									<label><input type="checkbox" name="module[1]" data-init-plugin="switchery" data-size="small" data-color="primary"> Therapy</label><br>
								@endif									
							@else
								@foreach ($modules as $key=>$module)
									<label><input type="checkbox" name="module[{{$key}}]" data-init-plugin="switchery" data-size="small" data-color="primary"> {{$module->Name}}</label><br>
								@endforeach
							@endif
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Update
								</button>
							</div>
						</div>
					</div>						
					{!!Form::close()!!}
				</div>
			</div>
	</div>

			
@stop