<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function insert(Image $img, Request $form)
    {

        $img = new Image();

        $img->titulo = $form->titulo;
        $img->desc = $form->desc;
       
        // Image Upload
        if($form->hasFile('arquivo') && $form->file('arquivo')->isValid()) {
            $requestImage = $form->arquivo;
            $extension = $requestImage->extension();

            //criptografa o arquivo e torna ele único com o 'strtotime'
            $imgName = md5($requestImage->getClientoriginalName(). strtotime("now")) . "." . $extension;
            
            //vai salvar o arquivo na pasta public
            $form->arquivo->move(public_path('img/'),$imgName);
            $img->arquivo = $imgName;
        }

        $img->save();

        return redirect()->route('galeria.index');
    }

    public function show(Image $img)
    {
        //redirecionar para a página de mostrar a imagem com informações mais específicas
        return view('imagens.show', ['img' => $img, 'pagina' => 'galeria']);
    }

}
