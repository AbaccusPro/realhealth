<h1>Personal History</h1>
	<h5>Yes or No</h5>
	@if (!isset($user))			
	<section class="col-md-6">
	
		<div class="form-group">
			{{--<label>Back trouble</label>
			{!!Form::checkbox('Back_trouble', '', ['class' => 'form-control'])!!}--}}
			<label>Back trouble <input type="checkbox" name="Back_trouble"></label>
		</div>
		
		<div class="form-group">
			<label>Neck trouble <input type="checkbox" name="Neck_trouble"></label>
		</div>

		<div class="form-group">
			<label>Joint injury <input type="checkbox" name="Joint_injury"></label>
		</div>

		<div class="form-group">
			<label>Carpal tunnel <input type="checkbox" name="Carpal_tunnel"></label>
		</div>

		<div class="form-group">
			<label>Bleeding <input type="checkbox" name="Bleeding"></label>
		</div>

		<div class="form-group">
			<label>Enlarged glands <input type="checkbox" name="Enlarged_glands"></label>
		</div>

		<div class="form-group">
			<label>Rashes <input type="checkbox" name="Rashes"></label>
		</div>

	</section>

	<section class="col-md-6">

		<div class="form-group">
			<label>Unexplained lumps <input type="checkbox" name="Unexplained_lumps"></label>	
		</div>

		<div class="form-group">
			<label>Chronic fatigue <input type="checkbox" name="Chronic_fatigue"></label>
		</div>

		<div class="form-group">
			<label>Night sweats <input type="checkbox" name="Night_sweats"></label>
		</div>
	
		<div class="form-group">
			<label>Undesired weight loss <input type="checkbox" name="Undesired_weight_loss"></label>
		</div>

		<div class="form-group">
			<label>Snoring <input type="checkbox" name="Snoring"></label>
		</div>

		<div class="form-group">
			<label>Difficulty sleeping <input type="checkbox" name="Difficulty_sleeping"></label>
		</div>

		<div class="form-group">
			<label>Low blood sugar <input type="checkbox" name="Low_blood_sugar"></label>
		</div>

	</section>
	@else

		<section class="col-md-6">
	
		<div class="form-group">
			@if ($user->information->body->goal->history->Back_trouble == null)
				<label>Back trouble <input type="checkbox" name="Back_trouble"></label>
			@else
				<label>Back trouble <input type="checkbox" name="Back_trouble" checked></label>
			@endif
		</div>
		
		<div class="form-group">
			@if ($user->information->body->goal->history->Neck_trouble == null)
				<label>Neck trouble <input type="checkbox" name="Neck_trouble"></label>
			@else
				<label>Neck trouble <input type="checkbox" name="Neck_trouble" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Joint_injury == null)
				<label>Joint injury <input type="checkbox" name="Joint_injury"></label>
			@else
				<label>Joint injury <input type="checkbox" name="Joint_injury" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Carpal_tunnel == null)
				<label>Carpal tunnel <input type="checkbox" name="Carpal_tunnel"></label>
			@else
				<label>Carpal tunnel <input type="checkbox" name="Carpal_tunnel" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Bleeding == null)
				<label>Bleeding <input type="checkbox" name="Bleeding"></label>
			@else
				<label>Bleeding <input type="checkbox" name="Bleeding" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Enlarged_glands == null)
				<label>Enlarged glands <input type="checkbox" name="Enlarged_glands"></label>
			@else
				<label>Enlarged glands <input type="checkbox" name="Enlarged_glands" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Rashes == null)
				<label>Rashes <input type="checkbox" name="Rashes"></label>
			@else
				<label>Rashes <input type="checkbox" name="Rashes" checked></label>
			@endif
		</div>

	</section>

	<section class="col-md-6">

		<div class="form-group">
			@if ($user->information->body->goal->history->Unexplained_lumps == null)
				<label>Unexplained lumps <input type="checkbox" name="Unexplained_lumps"></label>
			@else
				<label>Unexplained lumps <input type="checkbox" name="Unexplained_lumps" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Chronic_fatigue == null)
				<label>Chronic fatigue <input type="checkbox" name="Chronic_fatigue"></label>
			@else
				<label>Chronic fatigue <input type="checkbox" name="Chronic_fatigue" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Night_sweats == null)
				<label>Night sweats <input type="checkbox" name="Night_sweats"></label>
			@else
				<label>Night sweats <input type="checkbox" name="Night_sweats" checked></label>
			@endif
		</div>
	
		<div class="form-group">
			@if ($user->information->body->goal->history->Undesired_weight_loss == null)
				<label>Undesired weight loss <input type="checkbox" name="Undesired_weight_loss"></label>
			@else
				<label>Undesired weight loss <input type="checkbox" name="Undesired_weight_loss" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Snoring == null)
				<label>Snoring <input type="checkbox" name="Snoring"></label>
			@else
				<label>Snoring <input type="checkbox" name="Snoring" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Difficulty_sleeping == null)
				<label>Difficulty sleeping <input type="checkbox" name="Difficulty_sleeping"></label>
			@else
				<label>Difficulty sleeping <input type="checkbox" name="Difficulty_sleeping" checked></label>
			@endif
		</div>

		<div class="form-group">
			@if ($user->information->body->goal->history->Low_blood_sugar == null)
				<label>Low blood sugar <input type="checkbox" name="Low_blood_sugar"></label>
			@else
				<label>Low blood sugar <input type="checkbox" name="Low_blood_sugar" checked></label>
			@endif
		</div>

	</section>

	@endif