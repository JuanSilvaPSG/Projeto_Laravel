<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        # code...
        return "<h1>Listagem do usuário com código {$id} </h1>" ;

    }

    public function getData()
    {
        # code...
        return "<h1>Disparou ação de GET</h1>";
    }
}
