@extends('layouts.Master')
@section('title')  @stop

@section('body')
	<section class="container">
		<section class="row">
			<h3><legend>Workout</legend></h3>
				<div class="form-group">
					<div class="col-md-3">
						<label>Workout</label>
					</div>
					<div class="col-md-3">
						<p>{{$workout->Name_workout}}</p>	
					</div>
					<div class="col-md-3">
						<label>Date</label>
					</div>
					<div class="col-md-3">
						<p>{{$workout->Current_date}}</p>
					</div>
					<div class="col-md-3">
						<label>Goal</label>
					</div>
					<div class="col-md-3">
						<p>{{$workout->Fitness_goal}}</p>	
					</div>
					<div class="col-md-3">
						<label>Start Time</label>
					</div>
					<div class="col-md-3">
						<p>{{$workout->Start_time}}</p>	
					</div>
					<div class="col-md-3">
						<label>End Time</label>
					</div>
					<div class="col-md-3">
						<p>{{$workout->End_time}}</p>
					</div>			        
				</div>
		</section>
		<section class="row">
			<h3><legend>Cardio</legend></h3>
			<div class="form-group">
				<div class="col-md-4">
					<label>Excercise</label>
				</div>
				<div class="col-md-4">
					<label>Measure</label>
				</div>
				<div class="col-md-4">
					<label>Notes</label>
				</div>
				@foreach ($workout->cardios as $cardio)
					<div class="col-md-4">
						<p>{{$cardio->Excercise}}</p>
					</div>
					<div class="col-md-4">
						<p>{{$cardio->Measure}}</p>
					</div>
					<div class="col-md-4">
						<p>{{$cardio->Notes}}</p>
					</div>
				@endforeach	
			</div>	
		</section>
		<section class="row">
			<h3><legend>Training</legend></h3>
			<div class="form-group">
				<div class="col-md-3">
					<label>Excercise</label>
				</div>
				<div class="col-md-1">
					<label>Weight</label>
				</div>
				<div class="col-md-1">
					<label>Sets</label>
				</div>
				<div class="col-md-2">
					<label>Reps</label>
				</div>
				<div class="col-md-1">
					<label>Rest</label>
				</div>
				<div class="col-md-4">
					<label>Notes</label>
				</div>
				@foreach ($workout->trainings as $training)
					<div class="col-md-3">
						<p>{{$training->Excercise}}</p>
					</div>
					<div class="col-md-1">
						<p>{{$training->Weight}}</p>
					</div>
					<div class="col-md-1">
						<p>{{$training->Sets}}</p>
					</div>
					<div class="col-md-2">
						<p>{{$training->Reps}}</p>
					</div>
					<div class="col-md-1">
						<p>{{$training->Rest}}</p>
					</div>
					<div class="col-md-4">
						<p>{{$training->Notes}}</p>
					</div>
				@endforeach	
			</div>	
		</section>
		<section class="row">
			<h3><legend>Diet</legend></h3>
			<div class="form-group">
				<div class="col-md-3">
					<label>Meal</label>
				</div>
				<div class="col-md-8">
					<label>Fods</label>
				</div>
				<div class="col-md-1">
					<label>Calories</label>
				</div>
				@foreach ($workout->diets as $diet)
					<div class="col-md-3">
						<p>{{$diet->Meal}}</p>
					</div>
					<div class="col-md-8">
						<p>{{$diet->Fods}}</p>
					</div>
					<div class="col-md-1">
						<p>{{$diet->Calories}}</p>
					</div>
				@endforeach	
			</div>
		</section>

	</section>
@stop