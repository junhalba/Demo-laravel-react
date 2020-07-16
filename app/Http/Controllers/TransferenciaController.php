<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transferencia;
use App\Cliente;

class TransferenciaController extends Controller
{
    public function store(Request $request){
        $cliente = Cliente::find($request->cliente_id);
        $cliente->money = $cliente->money + $request->amount;
        $cliente->update();

        $transferencia = new Transferencia();
        $transferencia->description = $request->description;
        $transferencia->amount = $request->amount;
        $transferencia->cliente_id = $request->cliente_id;
        $transferencia->save();

        return response()->json($transferencia, 201);
    }
}
