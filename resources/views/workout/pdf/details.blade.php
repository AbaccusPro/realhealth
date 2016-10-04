<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<section class="container">
		<section class="row">
			<h3><legend>Workout</legend></h3>
			<div class="form-group">

				<div class="table-responsive">
					<table class = "table table-datatable table-bordered" id="basicDataTable">
						<thead>
					           <tr>
					             <th scope="sort-alpha">Workout</th>
					             <th scope="sort-alpha">Date</th>
					             <th scope="sort-alpha">Goal</th>
					             <th scope="sort-alpha">Start Time</th>
					             <th scope="sort-alpha">End Time</th>
					           </tr>
					    </thead>
					    <tbody>
					     
					           <tr class="odd gradeX">
					             <td>{{$workout->Name_workout}}</td>
					             <td>{{$workout->Current_date}}</td>
					             <td>{{$workout->Fitness_goal}}</td>
					             <td>{{$workout->Start_time}}</td>
					             <td>{{$workout->End_time}}</td>
					           </tr>
					      
					    </tbody> 
					</table>
				</div>	    
						        
			</div>
		</section>
		<section class="row">
			<h3><legend>Cardio</legend></h3>
			<div class="form-group">
				<div class="table-responsive">
					<table class = "table table-datatable table-bordered" id="basicDataTable">
						<thead>
					           <tr>
					             <th scope="sort-alpha">Excercise</th>
					             <th scope="sort-alpha">Measure</th>
					             <th scope="sort-alpha">Notes</th>
					           </tr>
					    </thead>
					    <tbody>
					     @foreach ($workout->cardios as $cardio)
					           <tr class="odd gradeX">
					             <td>{{$cardio->Excercise}}</td>
					             <td>{{$cardio->Measure}}</td>
					             <td>{{$cardio->Notes}}</td>
					           </tr>
					      @endforeach
					    </tbody> 
					</table>
				</div>	    
			</div>	
		</section>

		<section class="row">
			<h3><legend>Training</legend></h3>
			<div class="form-group">

				<div class="table-responsive">
					<table class = "table table-datatable table-bordered" id="basicDataTable">
						<thead>
					           <tr>
					             <th scope="sort-alpha">Excercise</th>
					             <th scope="sort-alpha">Weight</th>
					             <th scope="sort-alpha">Sets</th>
					             <th scope="sort-alpha">Reps</th>
					             <th scope="sort-alpha">Rest</th>
					             <th scope="sort-alpha">Notes</th>
					           </tr>
					    </thead>
					    <tbody>
					     @foreach ($workout->trainings as $training)
					           <tr class="odd gradeX">
					             <td>{{$training->Excercise}}</td>
					             <td>{{$training->Weight}}</td>
					             <td>{{$training->Sets}}</td>
					             <td>{{$training->Reps}}</td>
					             <td>{{$training->Rest}}</td>
					             <td>{{$training->Notes}}</td>
					           </tr>
					      @endforeach
					    </tbody> 
					</table>
				</div>	    
			</div>	
		</section>

		<section class="row">
			<h3><legend>Diet</legend></h3>
			<div class="form-group">
				<div class="table-responsive">
					<table class = "table table-datatable table-bordered" id="basicDataTable">
						<thead>
					           <tr>
					             <th scope="sort-alpha">Meal</th>
					             <th scope="sort-alpha">Fods</th>
					             <th scope="sort-alpha">Calories</th>
					           </tr>
					    </thead>
					    <tbody>
					     @foreach ($workout->diets as $diet)
					           <tr class="odd gradeX">
					             <td>{{$diet->Meal}}</td>
					             <td>{{$diet->Fods}}</td>
					             <td>{{$diet->Calories}}</td>
					           </tr>
					      @endforeach
					    </tbody> 
					</table>
				</div>
			</div>
		</section>
		
		@if(!isset($bol))
		<section class="row">
			<br><br>
			<a href="{{url('pdf/workout', base64_encode($workout->id))}}" class="btn btn-warning">View PDF</a>
		</section>
		@endif
	</section>
</body>
</html>