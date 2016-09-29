@extends('layouts.Master')

@section('title') Assign Workout @stop

@section('head')
<script>
$(document).ready(function() {
    $("#basicDataTable").DataTable({
        "order": [],
    });
});
</script>
@stop

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
			    <!--se recorre la variable que viene del controlador y se imprimen los datos-->
			     @foreach($usuarios as $usuario)
			           <tr class="odd gradeX">
			             <td>{{$usuario->username}}</td>
			             <td>{{$usuario->email}}</td>
			             <td>{{$usuario->rol->Rol}}</td>
			             <!--links a las rutas definidad con el parametro de id-->
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

@stop