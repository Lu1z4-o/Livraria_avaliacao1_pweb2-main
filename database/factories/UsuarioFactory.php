<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Gera um nome completo real (ex: João da Silva)
            'nome' => fake()->name(),
            
            // Gera um CPF no formato padrão usando numerify
            'cpf' => fake()->numerify('###########'),
            
            // Gera um endereço completo. Nota: evite usar 'ç' em colunas do banco (use 'endereco')
            'endereco' => fake()->address(), 
            
            // Gera um email seguro e único
            'email' => fake()->unique()->safeEmail(),
            
            // Gera um número de telefone no padrão brasileiro de celular
            'telefone' => fake()->numerify('(##) 9####-####'),

            // Exemplo de como pegar um ID aleatório de forma otimizada:
            // 'categoria_id' => \App\Models\CategoriaLivraria::inRandomOrder()->value('id'),
        ];
    }
}