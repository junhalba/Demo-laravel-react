<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::firstOrFail();
        return response()->json($cliente->load('transferencias'), 200);
    }
}
