@extends('layouts.Master')

@section('title') Assign Workout @stop

@section('head')

<script type="text/JavaScript">
$(document).on('ready', function(){
	$('#cardio').on('click', function(e){
	e.preventDefault();
	// get the last DIV which ID starts with ^= "klon"
	var div = $('div[id^="car"]:last');

	// Read the Number from that DIV's ID (i.e: 3 from "klon3")
	// And increment that number by 1
	var num = parseInt(div.prop("id").match(/\d+/g), 10) +1;

	// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
	var klon = div.clone().prop('id', 'car'+num ).insertAfter(div).find("input[type='text']").val("");
	$('div[id^="car"]:last label').remove();
	});

	$('#training').on('click', function(e){
	e.preventDefault();
	var div = $('div[id^="tra"]:last');
	var num = parseInt(div.prop("id").match(/\d+/g), 10) +1;
	var klon = div.clone().prop('id', 'tra'+num ).insertAfter(div).find("input[type='text']").val("");
	$('div[id^="tra"]:last label').remove();
	});

	$('#diet').on('click', function(e){
	e.preventDefault();
	var div = $('div[id^="diet"]:last');
	var num = parseInt(div.prop("id").match(/\d+/g), 10) +1;
	var klon = div.clone().prop('id', 'diet'+num ).insertAfter(div).find("input[type='text']").val("");
	$('div[id^="diet"]:last label').remove();
	});

	$('#-diet').on('click', function(e){
		e.preventDefault();
		if($('div[id^="diet"]:last').attr('id') != 'diet1')	$('div[id^="diet"]:last').remove();
	});

	$('#-training').on('click', function(e){
		e.preventDefault();
		if($('div[id^="tra"]:last').attr('id') != 'tra1') $('div[id^="tra"]:last').remove();
	});

	$('#-cardio').on('click', function(e){
		e.preventDefault();
		if($('div[id^="car"]:last').attr('id') != 'car1') $('div[id^="car"]:last').remove();
	});

	$('#boton').on('click', function(e){
		e.preventDefault();
		var Excercise = valores($("input[name^='Excercise_C']"));
		var Measure = valores($("input[name^='Measure']"));
		var Notes = valores($("input[name^='Notes_C']"));
		var Excercise_T = valores($("input[name^='Excercise_T']"));
		var Weight = valores($("input[name^='Weight']"));
		var Sets = valores($("input[name^='Sets']"));
		var Reps = valores($("input[name^='Reps']"));
		var Rest = valores($("input[name^='Rest']"));
		var Notes_T = valores($("input[name^='Notes_T']"));
		var Meal = valores($("input[name^='Meal']"));
		var Fods = valores($("input[name^='Fods']"));
		var Calories = valores($("input[name^='Calories']"));
		var $inputs = $('#myForm :input');

	    // not sure if you wanted this, but I thought I'd add it.
	    // get an associative array of just the values.
	    var values = {};
	    $inputs.each(function() {
	        values[this.name] = $(this).val();
	    });
	    
        console.log(Excercise_T);
	    
		$.ajax({
		   	type: "POST",
		   	url: "{{ url('assign/workout', $usuario->id) }}",
		   	data: {values, Excercise, Measure, Notes, Excercise_T, Weight, Sets, Reps, Rest, Notes_T, Meal, Fods, Calories},
		   	headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		   	success: function() {
		   		alert('datos guardados correctamente');
		   		$('#myForm').each (function(){
		   			this.reset();
				});
		   	}
		});
	});
});	
</script>
<script>
	//functions
	function valores(input_array){
		/* var values2 = $("input[name^='Excercise_T']")
              .map(function(){return $(this).val();}).get();*/
		return input_array.map(function(){return $(this).val();}).get();
	}
</script>

@stop

@section('body')
<meta name="_token" content="{!! csrf_token() !!}" />
<section class="container">
	<section class="row">
	<h3>Assign Workout to User: {{$usuario->first_name}}</h3>
	{!!Form::open(['url' => ['assign/workout', $usuario->id], 'files'=> true, 'method' => 'POST', 'id' => 'myForm'])!!}
	<div class="row">
		<div class="col-md-4">
		<div class="form-group">
			<label>Current Date</label>
			{!!Form::date('Current_date', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}	
		</div>
		</div>
		<div class="col-md-4">
		<div class="form-group">
			<label>Start Time</label>
			{!!Form::time('Start_time', null, ['class' => 'form-control'])!!}	
		</div>
		</div>
		<div class="col-md-4">
		<div class="form-group">
			<label>End Time</label>
			{!!Form::time('End_time', null, ['class' => 'form-control'])!!}	
		</div>
		</div>	
	</div>

	<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Scale Weight</label>
			{!!Form::text('Scale_weight', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Body Fat</label>
			{!!Form::text('Body_fat', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fitness Goal</label>
			{!!Form::text('Fitness_goal', null, ['class' => 'form-control'])!!}	
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Sleep (HRS)</label>
			{!!Form::text('Sleep_hrs', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Name of Workout</label>
			{!!Form::text('Name_workout', null, ['class' => 'form-control'])!!}	
		</div>
	</div>
	</div>
		<div class="row">
		<legend>Cardio</legend>
			<div class="cardio" id="car1">
				<div class="col-md-4">
					<div class="form-group">
						<label>Excercise</label>
						{!!Form::text('Excercise_C[]', null, ['class' => 'form-control activeInput'])!!}	
					</div>
				</div>
				<div class="col-md-4">	
					<div class="form-group">
						<label>Measure</label>
						{!!Form::text('Measure[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>
				<div class="col-md-4">	
					<div class="form-group">
						<label>Notes</label>
						{!!Form::text('Notes_C[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>
			</div>

			<div class="action col-md-12">
				<a href="#" id="cardio" class="btn btn-success">+</a>
				<a href="#" id="-cardio" class="btn btn-success">-</a>
			</div>
			

		</div>

		<div class="row training">
		<legend>Training</legend>
			<div class="training" id="tra1">
				<div class="col-md-3">
					<div class="form-group">
						<label>Excercise</label>
						{!!Form::text('Excercise_T[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-1">	
					<div class="form-group">
						<label>Weight</label>
						{!!Form::text('Weight[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-1">	
					<div class="form-group">
						<label>Sets</label>
						{!!Form::text('Sets[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-2">	
					<div class="form-group">
						<label>Reps</label>
						{!!Form::text('Reps[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-1">	
					<div class="form-group">
						<label>Rest</label>
						{!!Form::text('Rest[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-4">	
					<div class="form-group">
						<label>Notes</label>
						{!!Form::text('Notes_T[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>
			</div>

			<div class="action col-md-12">
				<a href="#" id="training" class="btn btn-success">+</a>
				<a href="#" id="-training" class="btn btn-success">-</a>
			</div>
			
			</div>

		

		<div class="row diet">
		<legend>Diet</legend>
			<div class="diet" id="diet1">
				<div class="col-md-2">
					<div class="form-group">
						<label>Meal</label>
						{!!Form::text('Meal[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-9">	
					<div class="form-group">
						<label>Fods</label>
						{!!Form::text('Fods[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

				<div class="col-md-1">	
					<div class="form-group">
						<label>Calories</label>
						{!!Form::text('Calories[]', null, ['class' => 'form-control'])!!}	
					</div>
				</div>

			</div>
			
			<div class="action col-md-12">
				<a href="#" id="diet" class="btn btn-success">+</a>
				<a href="#" id="-diet" class="btn btn-success">-</a>
			</div>	
				
		</div>

			

		<div class="form-group"> <br><br>
			{!!Form::submit('Save',['class' => 'btn btn-success', 'id' => 'boton'])!!}
		</div> <br><br><br>
		</div>
		{!!Form::close()!!}
	</section>
</section>


@stop
