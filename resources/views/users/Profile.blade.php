@extends('layouts.Master')
@section('title') Perfil @stop
@section('head')

@stop

@section('body')
<div class="container">
	<div class="row">
		<h1>Profile User {{$usuario->first_name}}</h1>
		 <img src="data:image/$usuario->image->Mime;base64,{{chunk_split(base64_encode($usuario->image->File))}}"  width="15%" />
		<h2>General Data</h2>
		<p><strong>Name: </strong></p><p>{{$usuario->first_name}} {{$usuario->middle_name}}
		{{$usuario->last_name}}</p>
		<p><strong>Username: </strong></p><p>{{$usuario->username}}</p>
		<p><strong>Email: </strong></p><p>{{$usuario->email}}</p>	
	</div>
</div>
@stop