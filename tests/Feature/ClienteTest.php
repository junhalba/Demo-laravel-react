<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cliente;
use App\Transferencia;

class ClienteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCliente()
    {
        $cliente = factory(Cliente::class)->create();
        $tranferencias = factory(Transferencia::class, 3)->create([
            'Cliente_id' => $cliente->id
        ]);
        $response = $this->json('GET','/api/cliente');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id', 'name', 'money', 'transferencias' => [
                    '*' => [
                        'id', 'amount', 'description', 'cliente_id'
                    ]
                ]
            ]);
        
        $this->assertCount(3, $response->json()['transferencias']);
    }
}
