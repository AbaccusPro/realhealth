@extends('layouts.Master')
@section('title') Perfil @stop
@section('head')

@stop

@section('body')
<div class="container">
	<div class="row">
		<h1>Profile User {{$usuario->first_name}}</h1>
		{{-- este fragmento sirve para renderizar la imagen que esta guardada en la base de datos:
		<img src="data:image/$usuario->image->Mime;base64,{{chunk_split(base64_encode($usuario->image->File))}}"  width="15%" />
		donde:
		$usuario->image->Mime accede a través de los modelos a la extensión del archivo
		$usuario->image->File accede al archivo binario almacenado en la base de datos
		--}}
		 <img src="data:image/$usuario->image->Mime;base64,{{chunk_split(base64_encode($usuario->image->File))}}"  width="15%" />
		<h2>General Data</h2>
		<p><strong>Name: </strong></p><p>{{$usuario->first_name}} {{$usuario->middle_name}}
		{{$usuario->last_name}}</p>
		<p><strong>Username: </strong></p><p>{{$usuario->username}}</p>
		<p><strong>Email: </strong></p><p>{{$usuario->email}}</p>	
	</div>
</div>
@stop