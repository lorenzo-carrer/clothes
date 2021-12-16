@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Perfil')

@section('content')
<div class="row">
    <div class="col">
        <p>Seja bem-vindos à página de perfil</p>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th width="50%">Nome</th>
            <th>E-mail</th>
        </tr>

        @foreach ($usuarios as $usuario)
        <tr @if($usuario->admin == 1)class="table-dark"@endif>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
        </tr>
        
        @endforeach
    </table>
</div>
@endsection