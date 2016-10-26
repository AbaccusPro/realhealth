<h1>Diet</h1>
@if (!isset($user))
	<section class="col-md-6">
	
		<div class="form-group">
			<label>What do you consider a good weight for yourself?</label>
			{!!Form::text('d1', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>What is the most you have ever weighed (including when pregnant)?</label>
			{!!Form::text('d2', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>How old were you?</label>
			{!!Form::text('d3', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>My current weight is:</label>
			{!!Form::text('d4', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>One year ago my weight was:</label>
			{!!Form::text('d5', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>At age 21 my weight was:</label>
			{!!Form::text('d6', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Number of meals you usually eat per day:</label>
			{!!Form::text('d7', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
		<h6>Number of times per week you usually eat the following</h6>
			<label>Beef</label>
			{!!Form::text('Beef', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fish</label>
			{!!Form::text('Fish', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Desserts</label>
			{!!Form::text('Desserts', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Pork</label>
			{!!Form::text('Pork', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fowl</label>
			{!!Form::text('Fowl', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fried_foods</label>
			{!!Form::text('Fried_foods', null, ['class' => 'form-control'])!!}	
		</div>
	
	</section>

	<section class="col-md-6">						
		
		<h6>Number of servings (cups, glasses, or containers) per week you usually consume of</h6>
		<div class="form-group">
			<label>Milk</label>
			{!!Form::text('Milk', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Buttermilk</label>
			{!!Form::text('Buttermilk', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Skim_milk</label>
			{!!Form::text('Skim_milk', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Low_milk2</label>
			{!!Form::text('Low_milk2', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Low_milk1</label>
			{!!Form::text('Low_milk1', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Coffee</label>
			{!!Form::text('Coffee', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Tea</label>
			{!!Form::text('Tea', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Soda</label>
			{!!Form::text('Soda', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Glasses of water</label>
			{!!Form::text('Water', null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you ever drink alcoholic beverages?</label>
			{!!Form::select('d8', ['Yes' => 'Yes', 'No' => 'No'],null, ['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
		<h6>If yes, what is your approximate intake of these beverages?</h6>
			<label>Beer</label>
			{!!Form::select('d9', ['None' => 'None',
			'Ocassional' => 'Ocassional',
			'Often' => 'Often'],null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>if often</label>
			{!!Form::text('d9_5', null, ['class' => 'form-control', 'placeholder' => 'per week'])!!}	
		</div>

		<div class="form-group">
			<label>Wine</label>
			{!!Form::select('d10', ['None' => 'None',
			'Ocassional' => 'Ocassional',
			'Often' => 'Often'],null, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>if often</label>
			{!!Form::text('d10_5', null, ['class' => 'form-control', 'placeholder' => 'per week'])!!}	
		</div>

	</section>

	@else

	<section class="col-md-6">
	
		<div class="form-group">
			<label>What do you consider a good weight for yourself?</label>
			{!!Form::text('d1', $user->information->body->goal->history->aditional->smoke->dietH->d1, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>What is the most you have ever weighed (including when pregnant)?</label>
			{!!Form::text('d2', $user->information->body->goal->history->aditional->smoke->dietH->d2, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>How old were you?</label>
			{!!Form::text('d3', $user->information->body->goal->history->aditional->smoke->dietH->d3, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>My current weight is:</label>
			{!!Form::text('d4', $user->information->body->goal->history->aditional->smoke->dietH->d4, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>One year ago my weight was:</label>
			{!!Form::text('d5', $user->information->body->goal->history->aditional->smoke->dietH->d5, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>At age 21 my weight was:</label>
			{!!Form::text('d6', $user->information->body->goal->history->aditional->smoke->dietH->d6, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Number of meals you usually eat per day:</label>
			{!!Form::text('d7', $user->information->body->goal->history->aditional->smoke->dietH->d7, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
		<h6>Number of times per week you usually eat the following</h6>
			<label>Beef</label>
			{!!Form::text('Beef', $user->information->body->goal->history->aditional->smoke->dietH->Beef, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fish</label>
			{!!Form::text('Fish', $user->information->body->goal->history->aditional->smoke->dietH->Fish, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Desserts</label>
			{!!Form::text('Desserts', $user->information->body->goal->history->aditional->smoke->dietH->Desserts, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Pork</label>
			{!!Form::text('Pork', $user->information->body->goal->history->aditional->smoke->dietH->Pork, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fowl</label>
			{!!Form::text('Fowl', $user->information->body->goal->history->aditional->smoke->dietH->Fowl, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Fried_foods</label>
			{!!Form::text('Fried_foods', $user->information->body->goal->history->aditional->smoke->dietH->Fried_foods, ['class' => 'form-control'])!!}	
		</div>
	
	</section>

	<section class="col-md-6">						
		
		<h6>Number of servings (cups, glasses, or containers) per week you usually consume of</h6>
		<div class="form-group">
			<label>Milk</label>
			{!!Form::text('Milk', $user->information->body->goal->history->aditional->smoke->dietH->Milk, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Buttermilk</label>
			{!!Form::text('Buttermilk', $user->information->body->goal->history->aditional->smoke->dietH->Buttermilk, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Skim_milk</label>
			{!!Form::text('Skim_milk', $user->information->body->goal->history->aditional->smoke->dietH->Skim_milk, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Low_milk2</label>
			{!!Form::text('Low_milk2', $user->information->body->goal->history->aditional->smoke->dietH->Low_milk2, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Low_milk1</label>
			{!!Form::text('Low_milk1', $user->information->body->goal->history->aditional->smoke->dietH->Low_milk1, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Coffee</label>
			{!!Form::text('Coffee', $user->information->body->goal->history->aditional->smoke->dietH->Coffee, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Tea</label>
			{!!Form::text('Tea', $user->information->body->goal->history->aditional->smoke->dietH->Tea, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Soda</label>
			{!!Form::text('Soda', $user->information->body->goal->history->aditional->smoke->dietH->Soda, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Glasses of water</label>
			{!!Form::text('Water', $user->information->body->goal->history->aditional->smoke->dietH->Water, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>Do you ever drink alcoholic beverages?</label>
			{!!Form::select('d8', ['Yes' => 'Yes', 'No' => 'No'],$user->information->body->goal->history->aditional->smoke->dietH->d8, ['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
		<h6>If yes, what is your approximate intake of these beverages?</h6>
			<label>Beer</label>
			{!!Form::select('d9', ['None' => 'None',
			'Ocassional' => 'Ocassional',
			'Often' => 'Often'],$user->information->body->goal->history->aditional->smoke->dietH->d9, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>if often</label>
			{!!Form::text('d9_5', $user->information->body->goal->history->aditional->smoke->dietH->d9_5, ['class' => 'form-control', 'placeholder' => 'per week'])!!}	
		</div>

		<div class="form-group">
			<label>Wine</label>
			{!!Form::select('d10', ['None' => 'None',
			'Ocassional' => 'Ocassional',
			'Often' => 'Often'],$user->information->body->goal->history->aditional->smoke->dietH->d10, ['class' => 'form-control'])!!}	
		</div>

		<div class="form-group">
			<label>if often</label>
			{!!Form::text('d10_5', $user->information->body->goal->history->aditional->smoke->dietH->d10_5, ['class' => 'form-control', 'placeholder' => 'per week'])!!}	
		</div>

	</section>
	@endif