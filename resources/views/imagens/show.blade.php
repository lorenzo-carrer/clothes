@extends('templates.base')
@section('title', 'Ver Imagem')

@section('content')
<h1>{{ $img->titulo }}</h1>
<p>Descrição: {{$img->desc}}</p>

<img style="height:100%;width:100%" id="img-crop" src="{{asset('img/' . $img->arquivo)}}">
@endsection