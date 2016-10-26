<h1>Aditional Questions</h1>
 <h5>Questions honestly</h5>

 @if (!isset($user))
	<section class="col-md-6">

		<div class="form-group">
			<label>Are you experiencing any stresses, mood problems, relationship difficulties, or substance-related problems for which you would like resource or referral information on a confidential basis? </label>
			{!!Form::select('a0',['Yes' => 'Yes', 'No' => 'No'] ,null, ['class' => 'form-control'])!!}	
		</div>
		
		<div class="form-group">
			<label>Do you occasionally use or are you currently taking any prescription or over-the-counter medications? </label>
			{!!Form::select('a1',['Yes' => 'Yes', 'No' => 'No'] ,null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Which one</label>
			{!!Form::text('a1_5', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Have you had any surgical operations in the last 10 years? </label>
			{!!Form::select('a2', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Has anyone in your immediate family developed heart disease before the age of 60?</label>
			{!!Form::select('a3', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do any diseases run in your family?</label>
			{!!Form::select('a4', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you currently have a cold/cough, or have you had any in the last two weeks?</label>
			{!!Form::select('a5', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

	</section>

	<section class="col-md-6">

		<div class="form-group">
			<label>Have you ever been hospitalized?</label>
			{!!Form::select('a6', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Reason</label>
			{!!Form::text('a6_5', null, ['class' => 'form-control'])!!}	
		</div>
		
		<div class="form-group">
			<label>Are you currently under a doctor’s care?</label>
			{!!Form::select('a7', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Treatment</label>
			{!!Form::text('a7_5', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Have you had a change in the size or color of a mole, or a sore that would not heal in the past year?</label>
			{!!Form::select('a8', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you have any special concerns regarding your health that you would like to discuss with the doctor?</label>
			{!!Form::select('a9', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control'])!!}	
		</div>
	
	</section>
 @else
	<section class="col-md-6">

		<div class="form-group">
			<label>Are you experiencing any stresses, mood problems, relationship difficulties, or substance-related problems for which you would like resource or referral information on a confidential basis? </label>
			{!!Form::select('a0',['Yes' => 'Yes', 'No' => 'No'] ,$user->information->body->goal->history->aditional->a0, ['class' => 'form-control'])!!}	
		</div>
		
		<div class="form-group">
			<label>Do you occasionally use or are you currently taking any prescription or over-the-counter medications? </label>
			{!!Form::select('a1',['Yes' => 'Yes', 'No' => 'No'] ,$user->information->body->goal->history->aditional->a1, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Which one</label>
			{!!Form::text('a1_5', $user->information->body->goal->history->aditional->a1_5, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Have you had any surgical operations in the last 10 years? </label>
			{!!Form::select('a2', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a2, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Has anyone in your immediate family developed heart disease before the age of 60?</label>
			{!!Form::select('a3', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a3, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do any diseases run in your family?</label>
			{!!Form::select('a4', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a4, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you currently have a cold/cough, or have you had any in the last two weeks?</label>
			{!!Form::select('a5', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a5, ['class' => 'form-control'])!!}	
		</div>

	</section>

	<section class="col-md-6">

		<div class="form-group">
			<label>Have you ever been hospitalized?</label>
			{!!Form::select('a6', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a6, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Reason</label>
			{!!Form::text('a6_5', $user->information->body->goal->history->aditional->a6_5, ['class' => 'form-control'])!!}	
		</div>
		
		<div class="form-group">
			<label>Are you currently under a doctor’s care?</label>
			{!!Form::select('a7', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a7, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Treatment</label>
			{!!Form::text('a7_5', $user->information->body->goal->history->aditional->a7_5, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Have you had a change in the size or color of a mole, or a sore that would not heal in the past year?</label>
			{!!Form::select('a8', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a8, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you have any special concerns regarding your health that you would like to discuss with the doctor?</label>
			{!!Form::select('a9', ['Yes' => 'Yes', 'No' => 'No'], $user->information->body->goal->history->aditional->a9, ['class' => 'form-control'])!!}	
		</div>
	
	</section>
 @endif
	