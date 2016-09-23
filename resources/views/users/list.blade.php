@extends('layouts.Master')

@section('title') Assign Workout @stop

@section('body')
<div class="container">
	<div class="row">
		<section class="tile">	
		<h1>User List</h1>
			<div class="tile-body nopadding color greensea">
			<div class="table-responsive">
			<table class = "table table-datatable table-bordered" id="basicDataTable">
				<thead>
			           <tr>
			             <th scope="sort-alpha">Username</th>
			             <th scope="sort-alpha">Email</th>
			             <th scope="sort-alpha">type</th>
			             <th scope="sort-alpha">Actions</th>
			           </tr>
			    </thead>
			    <tbody>
			     @foreach($usuarios as $usuario)
			           <tr class="odd gradeX">
			             <td>{{$usuario->username}}</td>
			             <td>{{$usuario->email}}</td>
			             <td>{{$usuario->rol->Rol}}</td>
			             <td><a href="profile/user/{{base64_encode($usuario->id)}}" class="btn btn-success">Profile</a>
			             <a href="edit/user/{{base64_encode($usuario->id)}}" class="btn btn-primary">Update</a>
			             <a href="delete/user/{{base64_encode($usuario->id)}}" class="btn btn-danger">Delete</a>
			             </td>

			           </tr>
			      @endforeach  
			    </tbody> 
			</table>
			</div>	    
		    </div>
		</section>	
	</div>
</div>

{{--<div class="container">
	<div class="row">
		{!!Form::open(['url' => 'create/event','files' => true, 'method' => 'POST'])!!}
			<div class="form-group">
				<label>Clasificación</label>
				{!!Form::text('Clasificacion_Arma', null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Descripción</label>
				{!!Form::text('Descripcion_Arma', null, ['class' => 'form-control'])!!}	
			</div>
		{!!Form::close()!!}		
	</div>
</div>--}}
@stop