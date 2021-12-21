<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('profile.index', ['usuarios' => $usuarios, 'pagina' => 'Perfil']);
    }

    public function edit(){
        return view('profile.edit', ['usuario' => Auth::user(), 'pagina' => 'perfil']);
    }

    public function update(Request $form)
    {
        $user= Auth::user();
        $user->name = $form->nome;
        $user->email = $form->email;

        $user->save();

        return redirect()->route('perfil.index');
    }

    public function editSenha(){
        return view('profile.password', ['usuario' => Auth::user(), 'pagina' => 'perfil']);
    }
    public function updateSenha(Request $form)
    {
        $user= Auth::user();
        if ( Hash::check($form->senhaAtual, $user->password) && $form->senhaNova == $form->senhaConfirma){
            $user->password = Hash::make($form->senhaNova);
            return redirect()->route('perfil.index');
        }else{
            return redirect()->route('perfil.editSenha')->with('erro','Algum parâmetro está errado!');
        }

    }



}
