<?php

namespace App\Http\Controllers;

use App\Models\Livraria;
use App\Models\Avaliacao;
use App\Models\CategoriaLivro;
use App\Models\Hashtag;
use App\Models\Usuario;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    /**
     * Dashboard com gráficos dinâmicos e central de relatórios em PDF
     */
    public function index()
    {
        // Dados para os Gráficos
        // Gráfico 1: Barras - Quantidade de Livros por Categoria
        $categorias = CategoriaLivro::withCount('livros')->get();
        $labelsCategorias = $categorias->pluck('categoria');
        $dadosCategorias = $categorias->pluck('livros_count');

        // Gráfico 2: Rosca / Pizza - Hashtags mais utilizadas nos livros
        $hashtags = Hashtag::withCount('livros')->orderByDesc('livros_count')->take(6)->get();
        $labelsHashtags = $hashtags->pluck('tag');
        $dadosHashtags = $hashtags->pluck('livros_count');

        $totais = [
            'livros' => Livraria::count(),
            'ebooks' => Ebook::count(),
            'hashtags' => Hashtag::count(),
            'avaliacoes' => Avaliacao::count(),
            'usuarios' => Usuario::count(),
        ];

        return view('relatorios.index', compact(
            'labelsCategorias',
            'dadosCategorias',
            'labelsHashtags',
            'dadosHashtags',
            'totais'
        ));
    }

    /**
     * Relatório 1 em PDF: Listagem Completa de Livros e E-books (Catálogo de Domínio Público)
     */
    public function exportarLivrosPdf()
    {
        $livros = Livraria::with(['categoriaLivro', 'hashtags', 'ebook'])->orderBy('nome')->get();
        $dataGeracao = now()->format('d/m/Y H:i');

        $pdf = Pdf::loadView('relatorios.pdf_livros', compact('livros', 'dataGeracao'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('relatorio_catalogo_livros.pdf');
    }

    /**
     * Relatório 2 em PDF: Listagem de Avaliações e Críticas Literárias
     */
    public function exportarAvaliacoesPdf()
    {
        $avaliacoes = Avaliacao::with('livro')->orderByDesc('data')->get();
        $dataGeracao = now()->format('d/m/Y H:i');

        $pdf = Pdf::loadView('relatorios.pdf_avaliacoes', compact('avaliacoes', 'dataGeracao'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('relatorio_avaliacoes_leituras.pdf');
    }
}
