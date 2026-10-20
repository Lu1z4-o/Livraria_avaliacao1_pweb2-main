<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    // Tabela associada no banco de dados
    protected $table = 'hashtags';

    // Campos liberados para preenchimento em massa
    protected $fillable = [
        'tag',
        'tipo',
        'descricao',
        'cor',
    ];

    /**
     * Relacionamento N:N:
     * Uma hashtag pode pertencer a múltiplos livros.
     */
    public function livros()
    {
        return $this->belongsToMany(Livraria::class, 'livro_hashtag', 'hashtag_id', 'livro_id')->withTimestamps();
    }

    /**
     * Mutator para garantir que a hashtag sempre comece com '#'
     */
    public function setTagAttribute($value)
    {
        $val = trim($value ?? '');
        if (!empty($val) && !str_starts_with($val, '#')) {
            $val = '#' . $val;
        }
        $this->attributes['tag'] = $val;
    }
}

