<?php

use App\Models\User;

return [

    // Define os padrões de autenticação do sistema (qual guard e qual gerenciador de senhas usar por padrão)
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    // Define como os usuários são autenticados (aqui usa sessões de navegação para a web)
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    // Define de onde o Laravel busca os dados dos usuários no banco (usando o Model 'User' com Eloquent)
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', User::class),
        ],
    ],

    // Configura as regras para redefinição de senha (tabela de tokens, tempo de expiração em minutos e limite de tentativas)
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60, // O link de redefinição expira em 60 minutos
            'throttle' => 60, // O usuário deve esperar 60 segundos entre novos pedidos de senha
        ],
    ],

    // Tempo de expiração (em segundos) da confirmação de senha antes de pedir ao usuário para digitá-la novamente (padrão: 3 horas)
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];