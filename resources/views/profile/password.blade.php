@extends('templates.base')
@section('title', 'Alterar Senha')
@section('h1', 'Altere sua senha')

@section('content')
<div class="row">
    <div class="col">
        <p>Seja bem-vindos à página de  editar o perfil</p>
    </div>
</div>
<div class="row">
    <div class="col-4">

        @if (session('erro'))
        <div class="alert alert-danger">
            {{ session('erro') }}
        </div>
        @endif


        <form method="post" action="">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nome" class="form-label">Senha Atual *</label>
                <input type="password" required class="form-control" id="senhaAtual" name="senhaAtual"  >
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Nova Senha *</label>
                <input type="password"  required class="form-control" id="senhaNova" name="senhaNova"  >
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Confirmando Nova Senha *</label>
                <input type="password" required class="form-control" id="senhaConfirma" name="senhaConfirma"  >
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Alterar Senha</button>
            </div>
        </form>
    </div>
</div>
@endsection