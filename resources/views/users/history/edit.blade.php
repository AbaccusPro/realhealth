@extends('layouts.Master')

@section('title') Create Event @stop

@section('head')
<script type="text/javascript">
$(document).on('ready', function(){
	$('#myTab a').click(function(e) {
	  e.preventDefault(); //funcion para mostrar la tab seleccionada
	  $(this).tab('show');
	});

/*	// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	  var id = $(e.target).attr("href").substr(1);
	  window.location.hash = id;
	});*/ //comentado para que no se mueva la vista al cambiar pestaña

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');

	$(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }
	});

////////////////////////////////////////////////////////////////////

//funcion para obtener las relaciones de cada combo mediante la peticion ajax
	 $('#Asunto').on("change", function(e){ //cuando cambie
	 	//va hacia la ruta tipos, que esta vinculada a un metodo del controlador ajaz
        $.get("{{ url('tipos')}}",{ option: $(this).val() }, function(data) {
            //vacia los campos antes de cambiarlos
            $('#Tipos').empty();
            $('#Subeventos').empty();
            //recorre los datos obtenidos y los va acomodando en la opcion de los combos
            $.each(data.tipos, function(key, element) {
                $('#Tipos').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Tipos').val();
            });

            $.each(data.sube, function(key, element) {
                $('#Subeventos').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Subeventos').val();
            });
        });
    });

	 $('#Tipos').on("change", function(e){
        $.get("{{ url('subeventos')}}",{ option: $(this).val() }, function(data) {
            $('#Subeventos').empty();
            $.each(data, function(key, element) {
                $('#Subeventos').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Subeventos').val();
            });
        });
    });


	 /////////////////////////////////////////////////////////////////////

	 $('#Delegacion').on("change", function(e){
        $.get("{{ url('municipios')}}",{ option: $(this).val() }, function(data) {
            $('#Municipio').empty();
            $('#Localidad').empty();
            $.each(data.municipios, function(key, element) {
                $('#Municipio').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Municpio').val();
            });

            $.each(data.localidades, function(key, element) {
                $('#Localidad').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Localidad').val();
            });
        });
    });

	 $('#Municipio').on("change", function(e){
        $.get("{{ url('localidades')}}",{ option: $(this).val() }, function(data) {
            $('#Localidad').empty();
            $.each(data, function(key, element) {
                $('#Localidad').append("<option value='" + key + "'>" + element + "</option>");
                 var ruta = $('#Localidad').val();
            });
        });
    });


});

</script>
@stop

@section('body')
	<div class="container">
	<div class="row">
		<section role="tabpanel" class="menu-beer">

			@include('users.history.partials.tabspanel')

			<section class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="seccion1">
					{!!Form::model($user, ['url' => ['update/expedient', $user->id],'files' => true, 'method' => 'POST'])!!}
					
					@include('users.history.partials.information') <!-- Aqui el include es para colocar la parte del formulario que esta incluido en la ruta forms/secciones/evento en la parte de as vistas del framework-->
				</div>
						
				<div role="tabpanel" class="tab-pane" id="seccion2">
					@include('users.history.partials.body')
				</div>

				<div role="tabpanel" class="tab-pane" id="seccion3">
					@include('users.history.partials.goals')
				</div>

				<div role="tabpanel" class="tab-pane" id="seccion4">
					@include('users.history.partials.history')
				</div>

				<div role="tabpanel" class="tab-pane" id="seccion5">
					@include('users.history.partials.aditional')
				</div>

				<div role="tabpanel" class="tab-pane" id="seccion6">
					@include('users.history.partials.smoke')
				</div>

				<div role="tabpanel" class="tab-pane" id="seccion7">
					@include('users.history.partials.diet')
					<div class="row">
							<div class="col-md-6 col-md-offset-5">
								<br>{!!Form::submit('Update', ['class' => 'btn btn-warning', 'id' => 'enviar'])!!}		
							</div>
						</div>	
					<br>
				</div>							
			</section>
		</section>
	</div>
@stop