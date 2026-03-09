<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produtos>
 */
class ProdutosFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome'           => $this->faker->words(3, true),
            'codigo'         => strtoupper($this->faker->unique()->bothify('PROD-####')),
            'descricao'      => $this->faker->sentence(),
            'categoria'      => $this->faker->randomElement(['Eletrônicos', 'Alimentos', 'Vestuário', 'Ferramentas', 'Limpeza']),
            'preco'          => $this->faker->randomFloat(2, 5, 5000),
            'estoque_minimo' => $this->faker->numberBetween(1, 20),
            'unidade'        => $this->faker->randomElement(['un', 'kg', 'l', 'cx', 'm']),
            'status'         => $this->faker->randomElement(['ativo', 'inativo']),
            'observacoes'    => $this->faker->optional()->sentence(),
        ];
    }
}
