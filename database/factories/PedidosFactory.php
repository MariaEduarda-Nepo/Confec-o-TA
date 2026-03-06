<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'numero_pedido' => $this->faker->unique()->numerify('PED-####'),
        'data_pedido' => $this->faker->dateTime(),
        'valor_total' => $this->faker->randomFloat(2, 100, 10000),
        'status' => $this->faker->randomElement(['pendente', 'processando', 'concluído', 'cancelado']),
        'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}
