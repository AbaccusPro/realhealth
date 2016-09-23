@extends('layouts.Master')
@section('title') Registro Usuario @stop

@section('body')
<div class="container">
	<div class="row">
				<div class="panel panel-default">
				<div class="panel-heading"><h4>Register User</h4></div>
				<div class="panel-body">
					{!!Form::open(['url' => 'create/user','files' => true, 'Method' => 'Post',
					'class' => 'form-horizontal'])!!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 ">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('Nombres') }}">
							</div>
						</div>
			
						<div class="form-group">
							{!!Form::label('Middle Name', 'Middle Name',['class' => 'col-md-4 '])!!}
							<div class="col-md-6">
        					{!!Form::text('middle_name', null ,['class' => 'form-control'])!!}
        					</div>
						</div>
						
						<div class="form-group">
							{!!Form::label('Last Name', 'Last Name',['class' => 'col-md-4 '])!!}
							<div class="col-md-6">
        					{!!Form::text('last_name', null ,['class' => 'form-control'])!!}
        					</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 ">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="Email" value="{{ old('Email') }}">
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Tipo', 'Type User ', ['class' => 'col-md-4 '])!!}
							<div class="col-md-6">
							{!!Form::select('rol', $rol, "{{old('Rol')}}",
							['id' => 'Rol', 'class' => 'chosen-select form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Registrar
								</button>
							</div>
						</div>
					{!!Form::close()!!}
				</div>
			</div>
	</div>
</div>
@stop
