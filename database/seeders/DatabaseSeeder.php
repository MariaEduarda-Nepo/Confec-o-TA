<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Clientes;
use App\Models\Estoque;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  Clientes::factory()->create();([
        //  'nome' => 'Luiza',
        //  'cpf' => '12345678900',
        //  'telefone' => '11987654321',
        //  'reserva' => 1,
        // ]);
        

        User::factory(10)->create();
        Clientes::factory(10)->create();
        Estoque::factory(10)->create();
        Fornecedores::factory(10)->create();
        Pedidos::factory(10)->create();
            

        
    }
}
