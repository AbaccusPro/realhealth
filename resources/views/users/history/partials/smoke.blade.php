<h1>Smoke</h1>
@if (!isset($user))
	<section class="col-md-6">
	
		<div class="form-group">
			<label>Have you ever smoked cigarettes, cigars or a pipe?</label>
			{!!Form::select('s1', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
			<h6>(If no, skip to diet section)</h6>
		</div>


		<div class="form-group">
			<label>If you did or now smoke cigarettes, how many per day?</label>
			{!!Form::text('s2', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s2_age', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you did or now smoke cigars, how many per day?</label>
			{!!Form::text('s3', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s3_age', null, ['class' => 'form-control'])!!}	
		</div>
	
	</section>

	<section class="col-md-6">

		<div class="form-group">
			<label>If you did or now smoke a pipe, how many pipefuls a day?</label>
			{!!Form::text('s4', null, ['class' => 'form-control'])!!}	
		</div>
	
		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s4_age', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you have stopped smoking, when was it?</label>
			{!!Form::text('s5', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you now smoke, how long ago did you start?</label>
			{!!Form::text('s6', null, ['class' => 'form-control'])!!}	
		</div>
	
	</section>

@else
	<section class="col-md-6">
	
		<div class="form-group">
			<label>Have you ever smoked cigarettes, cigars or a pipe?</label>
			{!!Form::select('s1', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->smoke->s1, ['class' => 'form-control'])!!}	
			<h6>(If no, skip to diet section)</h6>
		</div>


		<div class="form-group">
			<label>If you did or now smoke cigarettes, how many per day?</label>
			{!!Form::text('s2', $user->information->body->goal->history->aditional->smoke->s2, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s2_age', $user->information->body->goal->history->aditional->smoke->s2_age, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you did or now smoke cigars, how many per day?</label>
			{!!Form::text('s3', $user->information->body->goal->history->aditional->smoke->s3, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s3_age', $user->information->body->goal->history->aditional->smoke->s3_age, ['class' => 'form-control'])!!}	
		</div>
	
	</section>

	<section class="col-md-6">

		<div class="form-group">
			<label>If you did or now smoke a pipe, how many pipefuls a day?</label>
			{!!Form::text('s4', $user->information->body->goal->history->aditional->smoke->s4, ['class' => 'form-control'])!!}	
		</div>
	
		<div class="form-group">
			<label>Age started</label>
			{!!Form::text('s4_age', $user->information->body->goal->history->aditional->smoke->s4_age, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you have stopped smoking, when was it?</label>
			{!!Form::text('s5', $user->information->body->goal->history->aditional->smoke->s5, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>If you now smoke, how long ago did you start?</label>
			{!!Form::text('s6', $user->information->body->goal->history->aditional->smoke->s6, ['class' => 'form-control'])!!}	
		</div>
	
	</section>
@endif