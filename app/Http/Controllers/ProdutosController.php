<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    
    public function index()
    {
        $produtos = Produto::orderBy('id', 'desc')->get();

        return view('produtos.index', ['prods' => $produtos, 'pagina' => 'produtos']);
    }

    public function show(Produto $prod)
    {
        return view('produtos.show', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function create()
    {
        return view('produtos.create', ['pagina' => 'produtos']);
    }

    public function insert(Request $form)
    {
        $imagemCaminho = $form->file('imagem')->store('', 'imagens');
        $prod = new Produto();

        $prod->nome = $form->nome;
        $prod->preco = $form->preco;
        $prod->descricao = $form->descricao;
        $prod->imagem = $imagemCaminho;

        $prod->save();

        return redirect()->route('produtos');
    }

    public function edit(Produto $prod)
    {
        return view('produtos.edit', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function update(Request $form, Produto $prod)
    {
        $prod->nome = $form->nome;
        $prod->preco = $form->preco;
        $prod->descricao = $form->descricao;

        $prod->save();

        return redirect()->route('produtos');
    }

    public function remove(Produto $prod)
    {
        return view('produtos.remove', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function delete(Produto $prod)
    {
        $prod->delete();

        return redirect()->route('produtos');
    }


    public function recorte(Produto $prod, Request $form){

        if($form->isMethod('post')){
            $img64 = explode(",",$form->img);
            $imgDeco = base64_decode($img64['1']);
            Storage::disk('imagens')->put($prod->imagem,$imgDeco);
        }

        return view('produtos.imagem', ['prod' => $prod,'pagina' => 'produtos']);

    }

}
