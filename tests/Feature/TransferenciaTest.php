<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use app\Cliente;
use app\Transferencia;

class TransferenciaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $cliente = factory(Cliente::class)->create();
        $transferencia = factory(Transferencia::class)->make();

        $response = $this->json('POST','/api/transferencia',[
            'description' => $transferencia->description,
            'amount' => $transferencia->amount,
            'cliente_id' => $$cliente->id
        ]);
        
        $response->assertJsonStructure([
            'id','description','amount','cliente_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('Transferencias', [
            'description' => $transferencia->description,
            'amount' => $transferencia->amount,
            'cliente_id' => $cliente->id
        ]);

        $this->assertDatabaseHas('clientes',[
            'id' => $cliente->id,
            'money' => $cliente->money + $transferencia->amount
        ]);
    }
}
