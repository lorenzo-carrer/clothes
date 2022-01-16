@extends('templates.base')
@section('title', 'Galeria')
@section('h1', 'Galeria')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à Galeria</p>

        <a class="btn btn-primary" href="{{route('galeria.inserir')}}" role="button">Inserir imagem</a>
    </div>
</div>

<div class="row">
    @foreach($imgs as $img)
    {{var_dump($img)}}
        <div class="col">
            <div class ="row">{{$img->titulo}}</div>
            <div class ="row">
            <a href="{{route('galeria.show',$img)}}"><img src="{{asset('storage/imagens/' . $img->arquivo)}}"></a></div>
        </div>
    @endforeach
</div>
@endsection
