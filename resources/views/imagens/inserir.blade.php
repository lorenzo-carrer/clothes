@extends('templates.base')
@section('title', 'Inserir Imagem')
@section('h1', 'Inserir Imagem')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" enctype="multipart/form-data" action="{{ route('galeria.gravar') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label"> título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <div class="mb-3">
            <label for="arquivo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="arquivo" id="arquivo">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>

        </form>

    </div>
</div>
@endsection