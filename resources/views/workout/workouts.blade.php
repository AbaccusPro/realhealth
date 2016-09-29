@extends('layouts.Master')

@section('title') Workouts @stop

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
		@if (count($workouts) != 0)
		<h1>Workouts of user {{$workouts->first()->user->first_name}}</h1>
			<div class="tile-body nopadding color greensea">
			<div class="table-responsive">
			<table class = "table table-datatable table-bordered" id="basicDataTable">
				<thead>
			           <tr>
			             <th scope="sort-alpha">Workout</th>
			             <th scope="sort-alpha">Date</th>
			             <th scope="sort-alpha">Goal</th>
			             <th scope="sort-alpha">Actions</th>
			           </tr>
			    </thead>
			    <tbody>
			    <!-- Se recorre la variable que se envio desde el controlador y se va imprimiendo cada uno de los campos que necesitamos  -->
			     @foreach($workouts as $workout)
			           <tr class="odd gradeX">
			             <td>{{$workout->Name_workout}}</td>
			             <td>{{$workout->Current_date}}</td>
			             <td>{{$workout->Fitness_goal}}</td>
			             <td>
			              <!-- Todos los id se envian mediante un link que nos lleva a otra ruta... la ruta esta previamente definida y esta vinculada con un metodo, el metodo es el que va a recibir el id y posteriormente se manipulara para los fines que se deseen-->
			             <a href="{{ url('details/workout', base64_encode($workout->id)) }}" class="btn btn-warning">Details Workout</a>
			             </td>
			           </tr>
			      @endforeach  
			    </tbody> 
			</table>
			</div>	    
		    </div>
		    @else
				<h2>Not assigned routines</h2>
		    @endif
		</section>	
	</div>
</div>

@stop