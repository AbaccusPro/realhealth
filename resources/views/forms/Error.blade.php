<!-- codigo para mostrar los errores... esto si es que existen -->
@if($errors->any())
		<div class="alert alert-danger alert-dismissable" id = "msj-error" role="alert" >
			<p>Correct the mistakes:</p>
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach	
			</ul>
		</div>	
@endif