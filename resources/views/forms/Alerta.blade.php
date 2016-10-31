<!--Codigo para mostrar alertas y mensajes de confirmación -->
@if (Session::has('message'))
	<div class="alert alert-success alert-dismissable" id = "alerta">
  	<button type="button" class="close" data-dismiss="alert">&times;</button>
  	{{Session::get('message')}}
	</div>
@endif