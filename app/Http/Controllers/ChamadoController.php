<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chamado;
use Illuminate\Support\Facades\Auth;
use DB;

class ChamadoController extends Controller
{
    public function index()
    {
        return view('chamados.index');
    }
}