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
    <div class="card" style="width: 18rem;">
        <a href="{{route('galeria.show',$img)}}"><img style="max-height:300px;max-width:300px;" src="{{asset('img/' . $img->arquivo)}}" class="card-img-top" alt="..."></a>
        <div class="card-body">
            <h5 class="card-title">{{$img->titulo}}</h5>
        </div>
    </div>
    @endforeach
</div>
@endsection
