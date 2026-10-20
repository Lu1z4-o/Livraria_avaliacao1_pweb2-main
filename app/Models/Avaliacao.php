<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    // Define explicitamente o nome da tabela no banco de dados
    protected $table = 'avaliacaos';

    // Lista os campos da tabela que podem ser preenchidos em massa (via Form/Request)
    protected $fillable = ['livro_id', 'autor', 'data', 'avaliacao'];

    protected $casts = [
        'livro_id' => 'integer',
        'data' => 'date',
    ];

    /**
     * Relacionamento 1:N inverso:
     * A avaliação pertence a um livro específico da Livraria.
     */
    public function livro()
    {
        return $this->belongsTo(Livraria::class, 'livro_id');
    }
}