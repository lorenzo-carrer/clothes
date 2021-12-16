<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('profile.index', ['usuarios' => $usuarios, 'pagina' => 'Perfil']);
    }
}
