<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// Cria e inicializa a aplicação Laravel apontando para a pasta raiz do projeto
return Application::configure(basePath: dirname(__DIR__))
    // Define os arquivos de rotas (web e terminal) e a rota '/up' para checar se o sistema está no ar
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // Espaço reservado para registrar middlewares globais (filtros de requisição)
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    // Configura o tratamento de erros: força respostas em formato JSON quando o erro acontecer em rotas de API
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();