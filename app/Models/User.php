<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Define quais campos podem ser preenchidos direto via formulário (sintaxe nova de atributos do PHP 8 / Laravel 11+)
#[Fillable(['name', 'email', 'password'])]
// Esconde esses dados sensíveis na hora de retornar o usuário em um JSON ou API
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; // Activa recursos de fábrica pra testes e envio de notificações ao usuário

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // Converte os tipos de dados automaticamente: a data de verificação vira um objeto de data e a senha é criptografada no banco
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}// basicamente tem função de gerenciar a autenticação e a segurança dos usuários no sistema.