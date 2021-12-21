@extends('templates.base')
@section('title', 'Editar Perfil')
@section('h1', 'Editar Perfil')

@section('content')
<div class="row">
    <div class="col">
        <p>Seja bem-vindos à página de  editar o perfil</p>
    </div>
</div>
<div class="row">
    <div class="col-4">

        <form method="post" action="">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"  value="{{$usuario->name}}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"  value="{{$usuario->email}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</div>
@endsection