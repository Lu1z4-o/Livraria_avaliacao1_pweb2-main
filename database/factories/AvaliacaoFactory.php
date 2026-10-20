<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFactory extends Factory
{
    public function definition(): array
    {
        {
        $livros=['Os tres porquinhos', 'Orgulho e Preconceito','Turma da Monica Jovem','A Morte no Nilo','Admirável Mundo Novo',
        'O Principe Cruel','Dom Casmurro','Noites Brancas','As Meninas','Romeu e Julieta','Torto Arado','Iracema','Cem anos de solidão',
         'A Paixão Segundo G.H.', 'Ensaio sobre a cegueira'];
        }
         return [
            'livro' => fake()->unique()->randomElement($livros),
            'autor' => fake()->name(),
            'data' => fake()->date(),
            'avaliacao' => $this->faker->text(200),           
        ];
    }

}
    
