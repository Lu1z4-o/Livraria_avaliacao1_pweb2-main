<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Livraria Acácia')</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Tipografia (Merriweather + Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Estilos do Layout Base -->
    <style>
        :root {
            --bg-canvas: #FAF7F2;
            --brand-dark: #22130B;
            --brand-medium: #382014;
            --brand-accent: #B85D36;
            --brand-accent-hover: #9E4A26;
            --brand-gold: #DDA15E;
            --brand-cream: #F4EBE1;
            --text-main: #2A1810;
            --text-muted: #6E5D53;
            --border-soft: #EADBCE;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }

        /* Navbar Moderna */
        .navbar-livraria {
            background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-medium) 100%);
            border-bottom: 3px solid var(--brand-accent);
            box-shadow: 0 4px 20px rgba(34, 19, 11, 0.25);
        }

        .navbar-livraria .navbar-brand {
            color: #FFF8F0 !important;
            font-size: 1.45rem;
            letter-spacing: -0.3px;
        }

        .navbar-livraria .nav-link {
            color: #E2D3C5 !important;
            font-weight: 500;
            padding: 0.5rem 0.9rem !important;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .navbar-livraria .nav-link:hover {
            color: #FFFFFF !important;
            background-color: rgba(255, 255, 255, 0.08);
            transform: translateY(-1px);
        }

        .navbar-livraria .nav-link.active {
            color: #FFFFFF !important;
            background-color: rgba(184, 93, 54, 0.45);
            font-weight: 600;
        }

        /* Botões estilizados */
        .btn-primary {
            background-color: var(--brand-accent);
            border-color: var(--brand-accent);
            color: #FFFFFF;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--brand-accent-hover);
            border-color: var(--brand-accent-hover);
            box-shadow: 0 4px 12px rgba(184, 93, 54, 0.3);
            color: #FFFFFF;
        }

        .btn-outline-primary {
            color: var(--brand-accent);
            border-color: var(--brand-accent);
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--brand-accent);
            border-color: var(--brand-accent);
            color: #FFFFFF;
        }

        /* Cards e Containers */
        .card-custom {
            background: #FFFFFF;
            border: 1px solid var(--border-soft);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            transition: all 0.25s ease;
        }

        .card-header-custom {
            background: #FCFAF7;
            border-bottom: 1px solid var(--border-soft);
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
            padding: 1rem 1.5rem;
        }

        /* Tabelas elegantes */
        .table-custom {
            margin-bottom: 0;
        }

        .table-custom thead th {
            background-color: #F8F4EE;
            color: var(--brand-dark);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-soft);
            padding: 0.9rem 1rem;
        }

        .table-custom tbody td, .table-custom tbody th {
            padding: 0.9rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-soft);
        }

        .table-custom tbody tr:hover {
            background-color: #FAF5EE !important;
        }

        /* Badges de Tropos / Hashtags */
        .tag-pill {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            font-size: 0.82rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
            text-decoration: none;
        }

        .tag-pill:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
        }

        /* Rodapé */
        .footer-livraria {
            background: linear-gradient(135deg, var(--brand-dark), var(--brand-medium));
            color: #C8B8AB;
            margin-top: auto;
            border-top: 3px solid var(--brand-accent);
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Header & Menu Unificado -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-livraria py-2 py-lg-3">
            <div class="container">
                <a class="navbar-brand brand-font d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <i class="bi bi-book-half text-warning fs-3"></i>
                    <span>Livraria Acácia</span>
                </a>

                <button class="navbar-toggler text-white border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Alternar navegação">
                    <i class="bi bi-list fs-1"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-1">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="bi bi-house-door me-1"></i> Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('livraria*') ? 'active' : '' }}" href="{{ url('livraria') }}">
                                <i class="bi bi-journal-bookmark me-1"></i> Livros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('ebook*') ? 'active' : '' }}" href="{{ url('ebook') }}">
                                <i class="bi bi-tablet me-1"></i> E-books
                                <span class="badge bg-info text-dark rounded-pill ms-1" style="font-size: 0.68rem;">1:1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('hashtag*') ? 'active' : '' }}" href="{{ url('hashtag') }}">
                                <i class="bi bi-hash me-1"></i> Hashtags
                                <span class="badge bg-warning text-dark rounded-pill ms-1" style="font-size: 0.68rem;">N:N</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('avaliacao*') ? 'active' : '' }}" href="{{ url('avaliacao') }}">
                                <i class="bi bi-star me-1"></i> Avaliações
                                <span class="badge bg-secondary rounded-pill ms-1" style="font-size: 0.68rem;">1:N</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('usuario*') ? 'active' : '' }}" href="{{ url('usuario') }}">
                                <i class="bi bi-people me-1"></i> Usuários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('relatorios*') ? 'active' : '' }}" href="{{ route('relatorios.index') }}">
                                <i class="bi bi-pie-chart-fill me-1 text-warning"></i> Gráficos & PDFs
                            </a>
                        </li>
                    </ul>

                    <!-- Ações Rápidas -->
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('relatorios.index') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 py-1 fw-semibold d-none d-xl-inline-flex align-items-center gap-1">
                            <i class="bi bi-bar-chart"></i> Relatórios
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle rounded-pill px-3 py-1 fw-semibold small" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-plus-circle me-1"></i> Cadastrar
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                                <li><a class="dropdown-item py-2" href="{{ url('livraria/create') }}"><i class="bi bi-journal-plus me-2 text-primary"></i>Novo Livro</a></li>
                                <li><a class="dropdown-item py-2" href="{{ url('ebook/create') }}"><i class="bi bi-tablet me-2 text-info"></i>Novo E-book (1:1)</a></li>
                                <li><a class="dropdown-item py-2" href="{{ url('hashtag/create') }}"><i class="bi bi-hash me-2 text-danger"></i>Nova # Hashtag (N:N)</a></li>
                                <li><a class="dropdown-item py-2" href="{{ url('avaliacao/create') }}"><i class="bi bi-star-fill me-2 text-warning"></i>Nova Avaliação (1:N)</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item py-2" href="{{ url('usuario/create') }}"><i class="bi bi-person-plus me-2 text-success"></i>Novo Usuário</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container my-4 my-md-5 flex-grow-1">
        <!-- Alertas Globais (Flash & Validação) -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3 d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div class="flex-grow-1">
                    <strong>Sucesso!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3 d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 text-danger"></i>
                <div class="flex-grow-1">
                    <strong>Atenção!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-x-octagon-fill fs-4 me-2 text-danger"></i>
                    <strong class="fs-6">Corrija os erros abaixo para continuar:</strong>
                </div>
                <ul class="mb-0 ps-4 small">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('conteudo')
    </main>

    <!-- Rodapé -->
    <footer class="footer-livraria py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <span class="brand-font fw-bold fs-5 text-white d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                        <i class="bi bi-book-half text-warning"></i> Livraria Acácia
                    </span>
                    <p class="small text-white-50 mb-0 mt-1">Trabalho Avaliativo 02 &bull; Desenvolvimento de Sistemas II &bull; IFSC</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="badge bg-dark-subtle text-light border border-secondary px-3 py-2 rounded-pill small">
                        <i class="bi bi-check2-circle text-success me-1"></i> Laravel 11 + Bootstrap 5 + MySQL
                    </span>
                    <p class="small text-white-50 mb-0 mt-2">&copy; {{ date('Y') }} Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>