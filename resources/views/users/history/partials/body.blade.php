<h1>Body Composition</h1>
	@if (!isset($user))
		<section class="col-md-6">
		<h5>Please provide the following skinfold measures (in mm)</h5>
			<div class="form-group">
				<label>Abdominal</label>
				{!!Form::text('Abdominal',null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Triceps</label>
				{!!Form::text('Triceps',null, ['class' => 'form-control', 'id' => 'Asunto'])!!}	
			</div>

			<div class="form-group">
				<label>Chest</label>
				{!!Form::text('Chest',null, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Mid Axillary</label>
				{!!Form::text('Mid_axillary',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Subcapsular</label>
				{!!Form::text('Subcapsular',null, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Suprailiac</label>
				{!!Form::text('Suprailiac', null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Thigh</label>
				{!!Form::text('Thigh',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

		</section>

		<section class="col-md-6">
		<h5>Please provide the following girth measurements (in centimetres)</h5>
			<div class="form-group">
				<label>Neck</label>
				{!!Form::text('Neck',null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Chest</label>
				{!!Form::text('Chest_cm',null, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Shoulder</label>
				{!!Form::text('Shoulder',null, ['class' => 'form-control', 'id' => 'Asunto'])!!}	
			</div>

			<div class="form-group">
				<label>Biceps</label>
				{!!Form::text('Biceps',null, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Waist</label>
				{!!Form::text('Waist',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Hips</label>
				{!!Form::text('Hips',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Thigh</label>
				{!!Form::text('Thigh_cm',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Calf</label>
				{!!Form::text('Calf',null, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

		</section>
	@else
		<section class="col-md-6">
		<h5>Please provide the following skinfold measures (in mm)</h5>
			<div class="form-group">
				<label>Abdominal</label>
				{!!Form::text('Abdominal',$user->information->body->Abdominal, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Triceps</label>
				{!!Form::text('Triceps',$user->information->body->Triceps, ['class' => 'form-control', 'id' => 'Asunto'])!!}	
			</div>

			<div class="form-group">
				<label>Chest</label>
				{!!Form::text('Chest',$user->information->body->Chest, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Mid Axillary</label>
				{!!Form::text('Mid_axillary',$user->information->body->Mid_axillary, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Subcapsular</label>
				{!!Form::text('Subcapsular',$user->information->body->Subcapsular, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Suprailiac</label>
				{!!Form::text('Suprailiac', $user->information->body->Suprailiac, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Thigh</label>
				{!!Form::text('Thigh',$user->information->body->Thigh, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

		</section>

		<section class="col-md-6">
		<h5>Please provide the following girth measurements (in centimetres)</h5>
			<div class="form-group">
				<label>Neck</label>
				{!!Form::text('Neck',$user->information->body->Neck, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Chest</label>
				{!!Form::text('Chest_cm',$user->information->body->Chest_cm, ['class' => 'form-control'])!!}	
			</div>

			<div class="form-group">
				<label>Shoulder</label>
				{!!Form::text('Shoulder',$user->information->body->Shoulder, ['class' => 'form-control', 'id' => 'Asunto'])!!}	
			</div>

			<div class="form-group">
				<label>Biceps</label>
				{!!Form::text('Biceps',$user->information->body->Biceps, ['class' => 'form-control', 'id' => 'Tipos'])!!}	
			</div>
			
			<div class="form-group">
				<label>Waist</label>
				{!!Form::text('Waist',$user->information->body->Waist, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Hips</label>
				{!!Form::text('Hips',$user->information->body->Hips, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Thigh</label>
				{!!Form::text('Thigh_cm',$user->information->body->Thigh_cm, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

			<div class="form-group">
				<label>Calf</label>
				{!!Form::text('Calf',$user->information->body->Calf, ['class' => 'form-control', 'id' => 'Subeventos'])!!}	
			</div>

		</section>
	@endif	