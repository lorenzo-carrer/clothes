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
            <th>Username</th>
            <th width="50%">Nome</th>
            <th>E-mail</th>
        </tr>

       
        <tr>
            <td> {{ Auth::user()->username}} </td>
            <td> {{ Auth::user()->name}} </td>
            <td> {{ Auth::user()->email}} </td>
        </tr>
        
    </table>
    
</div>
<div class="row">
    <div class="col-6">
    <a href="{{ route('perfil.edit') }}" role="button" class="btn btn-success">Editar Perfil</a>
    </div>
    <div class="col-6">
    <a href="{{ route('perfil.editSenha') }}" role="button" class="btn btn-success">Alterar Senha</a>
    </div>

</div>
@endsection