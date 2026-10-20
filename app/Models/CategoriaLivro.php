<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLivro extends Model
{
    use HasFactory;

    protected $table = 'categoria_livros';

    // Define quais campos podem ser preenchidos diretamente pelos formulários no banco
    protected $fillable = [
        'categoria',
    ];

    /**
     * Relacionamento 1:N:
     * Uma categoria possui muitos livros no acervo da Livraria.
     */
    public function livros()
    {
        return $this->hasMany(Livraria::class, 'categoria_id');
    }
}
