@extends('layouts.Master')
@section('title') Editar Usuario @stop

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