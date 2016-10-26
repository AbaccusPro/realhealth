<h1>Goals</h1>
	<h5>Given the following goals, please rank them in order of importance, with 1 being most important and 8 being least important.</h5>
	@if (!isset($user))
		<section class="col-md-6">

			<div class="form-group">
				<label>Improved Health</label>
				{!!Form::number('Improved_health', null, ['class' => 'form-control', 'id' => 'Delegacion'])!!}	
			</div>

			<div class="form-group">
				<label>Improved Endurance</label>
				{!!Form::number('Improved_endurance',null, ['class' => 'form-control', 'id' => 'Municipio'])!!}	
			</div>
			
			<div class="form-group">
				<label>Increased Strength</label>
				{!!Form::number('Increased_strength',null, ['class' => 'form-control', 'id' => 'Localidad'])!!}	
			</div>

			<div class="form-group">
				<label>Sport Specific</label>
				{!!Form::number('Sport_specific', null, ['class' => 'form-control'])!!}	
			</div>

		</section>

		<section class="col-md-6">
			
			<div class="form-group">
				<label>Increased Muscle Mass</label>
				{!!Form::number('Increased_muscle_mass', null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Fat Loss</label>
				{!!Form::number('Fat_loss', null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Increased Power</label>
				{!!Form::number('Increased_power', null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Weight Gain</label>
				{!!Form::number('Weight_gain', null, ['class' => 'form-control'])!!}	
			</div>		

		</section>

	@else
		<section class="col-md-6">

			<div class="form-group">
				<label>Improved Health</label>
				{!!Form::number('Improved_health', $user->information->body->goal->Improved_health, ['class' => 'form-control', 'id' => 'Delegacion'])!!}	
			</div>

			<div class="form-group">
				<label>Improved Endurance</label>
				{!!Form::number('Improved_endurance',$user->information->body->goal->Improved_endurance, ['class' => 'form-control', 'id' => 'Municipio'])!!}	
			</div>
			
			<div class="form-group">
				<label>Increased Strength</label>
				{!!Form::number('Increased_strength',$user->information->body->goal->Increased_strength, ['class' => 'form-control', 'id' => 'Localidad'])!!}	
			</div>

			<div class="form-group">
				<label>Sport Specific</label>
				{!!Form::number('Sport_specific', $user->information->body->goal->Sport_specific, ['class' => 'form-control'])!!}	
			</div>

		</section>

		<section class="col-md-6">
			
			<div class="form-group">
				<label>Increased Muscle Mass</label>
				{!!Form::number('Increased_muscle_mass', $user->information->body->goal->Increased_muscle_mass, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Fat Loss</label>
				{!!Form::number('Fat_loss', $user->information->body->goal->Fat_loss, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Increased Power</label>
				{!!Form::number('Increased_power', $user->information->body->goal->Increased_power, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Weight Gain</label>
				{!!Form::number('Weight_gain', $user->information->body->goal->Weight_gain, ['class' => 'form-control'])!!}	
			</div>		

		</section>
	@endif	