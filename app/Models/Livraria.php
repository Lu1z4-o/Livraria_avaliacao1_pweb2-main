<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraria extends Model
{
    use HasFactory;

    // Define qual é o nome exato da tabela no banco de dados
    protected $table = 'livraria';

    // Libera esses campos para serem cadastrados ou alterados direto pelos formulários
    protected $fillable = [
        'nome',
        'valor',
        'autor',
        'genero',
        'categoria_id',
        'imagem',
        'sinopse',
    ];

    protected $casts = [
        'categoria_id' => 'integer',
        'valor' => 'decimal:2',
    ];

    public function categoriaLivro()
    {
        return $this->belongsTo(CategoriaLivro::class, 'categoria_id');
    } //função que é chamada no list

    /**
     * Relacionamento N:N:
     * Um livro possui muitas hashtags, e uma hashtag pode estar atrelada a múltiplos livros.
     */
    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'livro_hashtag', 'livro_id', 'hashtag_id')->withTimestamps();
    }

    /**
     * Relacionamento 1:N:
     * Um livro possui muitas avaliações (resenhas).
     */
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'livro_id');
    }

    /**
     * Relacionamento 1:1:
     * Um livro físico/obra possui seu respectivo formato digital E-book.
     */
    public function ebook()
    {
        return $this->hasOne(Ebook::class, 'livro_id');
    }
}
