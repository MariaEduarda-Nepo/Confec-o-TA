<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedores>
 */
class FornecedoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nome' => $this->faker->company(),
        'cnpj' => $this->faker->unique()->numerify('##############'),
        'email' => $this->faker->companyEmail(),
        'telefone' => $this->faker->phoneNumber(),
        'endereco' => $this->faker->streetAddress(),
        'cidade' => $this->faker->city(),
        'estado' => $this->faker->stateAbbr(),
        'cep' => $this->faker->numerify('#####-###'),
        'observacoes' => $this->faker->optional()->paragraph(),
        ];
    }
}
