<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->get();

        return view('imagens.index', ['imgs' => $images, 'pagina' => 'galeria']);
    }

    public function create()
    {
        //redirecionar para a pagina que contém o form para obter os dados
        return view('imagens.inserir', ['pagina' => 'galeria']);
    }

    public function insert(Request $form)
    {
        //onde vai ficar as imagens salvas
        $imagemCaminho = $form->file('arquivo')->store('', 'imagens');
        $img = new Image();

        $img->titulo = $form->titulo;
        $img->desc = $form->desc;
        $img->arquivo = $imagemCaminho;

        $img->save();

        return redirect()->route('galeria.index');
    }

    public function show(Image $img)
    {
        //redirecionar para a página de mostrar a imagem com informações mais específicas
        return view('imagens.show', ['img' => $img, 'pagina' => 'galeria']);
    }

}
