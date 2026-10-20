<?php

return [

    // Nome principal do sistema usado em notificações e na interface
    'name' => env('APP_NAME', 'Laravel'),

    // Ambiente onde a aplicação está rodando (ex: 'local' para desenvolvimento ou 'production' para o site no ar)
    'env' => env('APP_ENV', 'production'),

    // Ativa ou desativa o modo de depuração (exibe erros detalhados se estiver 'true')
    'debug' => (bool) env('APP_DEBUG', false),

    // URL base do projeto, usada para gerar links corretos em comandos do terminal
    'url' => env('APP_URL', 'http://localhost'),

    // Fuso horário padrão usado em todas as funções de data e hora do PHP
    'timezone' => 'UTC',

    // Idioma principal do sistema (ex: 'pt_BR' para Português do Brasil)
    'locale' => env('APP_LOCALE', 'en'),

    // Idioma reserva caso a tradução solicitada não exista
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // Idioma usado para gerar dados falsos de teste (como nomes e endereços fictícios)
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    // Algoritmo de criptografia utilizado pelo sistema
    'cipher' => 'AES-256-CBC',

    // Chave de segurança de 32 caracteres usada para criptografar dados e sessões
    'key' => env('APP_KEY'),

    // Chaves antigas mantidas para decodificar dados gravados antes de uma troca de chave
    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    // Define como o Laravel gerencia o "modo de manutenção" quando o sistema está fora do ar para atualizações
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];