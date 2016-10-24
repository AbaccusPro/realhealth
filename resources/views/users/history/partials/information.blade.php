<h1>Basic Information</h1>
<div class="tile-body nopadding color greensea">                  
	<section class="col-md-6">
	
	<div class="form-group">
		<label>Name</label>
		{!!Form::text('Name', null, ['class' => 'form-control'])!!}
	</div>

	<div class="form-group">
		<label>Gender</label>
		{!!Form::select('Gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Age</label>
		{!!Form::number('Age', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Birthday</label>
		{!!Form::date('Birthday', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
	</div>

	<div class="form-group">
		<label>Height</label>
		{!!Form::text('Height', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Weight</label>
		{!!Form::text('Weight', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Body Fat</label>
		{!!Form::number('Body_fat', null, ['class' => 'form-control'])!!}	
	</div>
	
	</section>

	<section class="col-md-6">

	<div class="form-group">
		<label>Marital Status</label>
		{!!Form::select('Marital_status', ['Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced', 'Widowed' => 'Widowed'],null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Education</label>
		{!!Form::select('Education', ['Grade School' => ' Grade School'
		,'Jr. High School' =>'Jr. High School'
		,'High School' => 'High School'
		,'College' => 'College'
		,'Graduate School' => 'Graduate School'],
		null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Degree</label>
		{!!Form::text('Degree', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Position</label>
		{!!Form::text('Position', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Employer</label>
		{!!Form::text('Employer', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Address</label>
		{!!Form::text('Address', null, ['class' => 'form-control'])!!}	
	</div>

	<div class="form-group">
		<label>Phone</label>
		{!!Form::text('Phone', null, ['class' => 'form-control'])!!}	
	</div>
	
	</section>
</div>