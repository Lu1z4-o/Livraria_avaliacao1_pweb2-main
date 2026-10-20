@extends('layout')

@section('titulo', 'Gráficos & Relatórios em PDF - Livraria Acácia')

@section('conteudo')

<!-- Cabeçalho -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Início</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Relatórios & Gráficos</li>
            </ol>
        </nav>
        <h2 class="brand-font mb-1 d-flex align-items-center gap-2">
            <i class="bi bi-pie-chart-fill text-warning"></i> Painel de Métricas & Relatórios em PDF
        </h2>
        <p class="text-muted mb-0 small">
            Visualização analítica dos dados do acervo e emissão de relatórios oficiais em formato PDF (Critérios 8 e 9).
        </p>
    </div>
</div>

<!-- Cards com Indicadores Gerais (KPIs) -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-4 col-xl">
        <div class="card card-custom p-3 border-start border-4 border-primary">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase">Livros Físicos</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totais['livros'] ?? 0 }}</h3>
                </div>
                <div class="bg-primary-subtle text-primary p-2 rounded-circle">
                    <i class="bi bi-book fs-4"></i>
                </div>
            </div>
            <a href="{{ route('livraria.index') }}" class="small text-decoration-none text-primary mt-2 d-inline-block">Ver catálogo &rarr;</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-xl">
        <div class="card card-custom p-3 border-start border-4 border-info">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase">E-books (1:1)</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totais['ebooks'] ?? 0 }}</h3>
                </div>
                <div class="bg-info-subtle text-info p-2 rounded-circle">
                    <i class="bi bi-tablet fs-4"></i>
                </div>
            </div>
            <a href="{{ route('ebook.index') }}" class="small text-decoration-none text-info mt-2 d-inline-block">Ver e-books &rarr;</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-xl">
        <div class="card card-custom p-3 border-start border-4 border-warning">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase">Hashtags (N:N)</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totais['hashtags'] ?? 0 }}</h3>
                </div>
                <div class="bg-warning-subtle text-warning p-2 rounded-circle">
                    <i class="bi bi-hash fs-4"></i>
                </div>
            </div>
            <a href="{{ route('hashtag.index') }}" class="small text-decoration-none text-warning mt-2 d-inline-block">Ver tags &rarr;</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-xl">
        <div class="card card-custom p-3 border-start border-4 border-danger">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase">Avaliações (1:N)</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totais['avaliacoes'] ?? 0 }}</h3>
                </div>
                <div class="bg-danger-subtle text-danger p-2 rounded-circle">
                    <i class="bi bi-star-fill fs-4"></i>
                </div>
            </div>
            <a href="{{ route('avaliacao.index') }}" class="small text-decoration-none text-danger mt-2 d-inline-block">Ver resenhas &rarr;</a>
        </div>
    </div>

    <div class="col-12 col-md-4 col-xl">
        <div class="card card-custom p-3 border-start border-4 border-success">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase">Usuários Cadastrados</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totais['usuarios'] ?? 0 }}</h3>
                </div>
                <div class="bg-success-subtle text-success p-2 rounded-circle">
                    <i class="bi bi-people fs-4"></i>
                </div>
            </div>
            <a href="{{ route('usuario.index') }}" class="small text-decoration-none text-success mt-2 d-inline-block">Ver leitores &rarr;</a>
        </div>
    </div>
</div>

<!-- Seção de Emissão de Relatórios em PDF (Critério 8) -->
<div class="card card-custom mb-5">
    <div class="card-header-custom d-flex align-items-center justify-content-between">
        <div>
            <h5 class="brand-font mb-0 text-dark d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                Central de Emissão de Relatórios em PDF
            </h5>
            <small class="text-muted">Gere listagens formatadas e prontas para download ou impressão (Critério 8).</small>
        </div>
        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-2 small">
            2 Relatórios em PDF
        </span>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <!-- Relatório 1: Catálogo de Livros e E-books -->
            <div class="col-md-6">
                <div class="p-4 rounded-3 border bg-light h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                <i class="bi bi-book-half me-1"></i>Relatório 1
                            </span>
                            <span class="badge bg-white text-dark border">Formato A4</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Catálogo de Livros & E-books de Domínio Público</h5>
                        <p class="text-muted small mb-3">
                            Documento completo contendo todo o acervo físico, valores, categorias, dados das edições digitais (1:1) e hashtags (#) associadas a cada obra literária.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('relatorios.livros.pdf') }}" target="_blank" class="btn btn-danger w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                            <span>Gerar e Baixar PDF do Catálogo</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Relatório 2: Avaliações e Críticas Literárias -->
            <div class="col-md-6">
                <div class="p-4 rounded-3 border bg-light h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="bi bi-star-fill me-1"></i>Relatório 2
                            </span>
                            <span class="badge bg-white text-dark border">Formato A4</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Relatório de Avaliações & Críticas Literárias</h5>
                        <p class="text-muted small mb-3">
                            Listagem analítica com todas as resenhas cadastradas pelos leitores, títulos dos livros vinculados (1:N), autores e datas de conclusão das leituras.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('relatorios.avaliacoes.pdf') }}" target="_blank" class="btn btn-warning text-dark w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2 fw-semibold">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                            <span>Gerar e Baixar PDF de Avaliações</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Gráficos Dinâmicos com Chart.js (Critério 9) -->
<div class="row g-4 mb-4">
    <!-- Gráfico 1: Barras - Livros por Categoria -->
    <div class="col-lg-7">
        <div class="card card-custom h-100">
            <div class="card-header-custom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="brand-font mb-0 text-dark d-flex align-items-center gap-2">
                        <i class="bi bi-bar-chart-line-fill text-primary"></i>
                        Gráfico 1: Quantidade de Livros por Categoria
                    </h5>
                    <small class="text-muted">Formato em <strong>Barras Verticais</strong> utilizando dados da tabela do banco.</small>
                </div>
                <span class="badge bg-primary-subtle text-primary border rounded-pill px-2 py-1 small">Barras</span>
            </div>
            <div class="card-body p-4">
                <div style="position: relative; height: 320px; width: 100%;">
                    <canvas id="graficoCategorias"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico 2: Rosca - Hashtags mais utilizadas -->
    <div class="col-lg-5">
        <div class="card card-custom h-100">
            <div class="card-header-custom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="brand-font mb-0 text-dark d-flex align-items-center gap-2">
                        <i class="bi bi-pie-chart-fill text-warning"></i>
                        Gráfico 2: Top Hashtags nos Livros
                    </h5>
                    <small class="text-muted">Formato em <strong>Rosca (Doughnut)</strong> para análise de tropos literários.</small>
                </div>
                <span class="badge bg-warning-subtle text-dark border rounded-pill px-2 py-1 small">Rosca</span>
            </div>
            <div class="card-body p-4 d-flex align-items-center justify-content-center">
                <div style="position: relative; height: 320px; width: 100%;">
                    <canvas id="graficoHashtags"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Chart.js 4.4 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 1. Gráfico de Barras - Livros por Categoria
        const ctxCategorias = document.getElementById('graficoCategorias');
        if (ctxCategorias) {
            new Chart(ctxCategorias, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labelsCategorias) !!},
                    datasets: [{
                        label: 'Quantidade de Livros',
                        data: {!! json_encode($dadosCategorias) !!},
                        backgroundColor: [
                            'rgba(184, 93, 54, 0.85)',
                            'rgba(42, 157, 143, 0.85)',
                            'rgba(231, 111, 81, 0.85)',
                            'rgba(38, 70, 83, 0.85)',
                            'rgba(244, 162, 97, 0.85)',
                            'rgba(106, 4, 15, 0.85)'
                        ],
                        borderColor: [
                            '#B85D36',
                            '#2A9D8F',
                            '#E76F51',
                            '#264653',
                            '#F4A261',
                            '#6A040F'
                        ],
                        borderWidth: 1.5,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.raw + ' obra(s) cadastrada(s)';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        // 2. Gráfico em Rosca (Doughnut) - Top Hashtags Mais Usadas
        const ctxHashtags = document.getElementById('graficoHashtags');
        if (ctxHashtags) {
            new Chart(ctxHashtags, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($labelsHashtags) !!},
                    datasets: [{
                        data: {!! json_encode($dadosHashtags) !!},
                        backgroundColor: [
                            '#FF006E',
                            '#FB5607',
                            '#FFBE0B',
                            '#3A86FF',
                            '#8338EC',
                            '#2A9D8F'
                        ],
                        hoverOffset: 8,
                        borderWidth: 2,
                        borderColor: '#FFFFFF'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 12,
                                font: { size: 11 }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ': ' + context.raw + ' livro(s)';
                                }
                            }
                        }
                    },
                    cutout: '62%'
                }
            });
        }
    });
</script>
@endpush
