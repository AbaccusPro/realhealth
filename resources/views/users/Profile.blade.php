@extends('layouts.Master')
@section('title') Perfil @stop
@section('head')

@stop

@section('body')
<div class="container">
	<div class="row">
		<h1>Perfil del usuario {{$usuario->nombre}}</h1>
	
		<h2>Datos Generales</h2>
		<p><strong>Nombre Completo: </strong></p><p>{{$usuario->first_name}} {{$usuario->middle_name}}
		{{$usuario->last_name}}</p>
		<p><strong>Username: </strong></p><p>{{$usuario->username}}</p>
		<p><strong>Correo: </strong></p><p>{{$usuario->email}}</p>	
	</div>
</div>
@stop