@extends('templates.base')
@section('title', 'Ver Imagem')

@section('content')
<h1>{{ $img->titulo }}</h1>
<p>Descrição: {{$img->desc}}</p>

<img src="{{asset('img/' . $img->arquivo)}}">
@endsection