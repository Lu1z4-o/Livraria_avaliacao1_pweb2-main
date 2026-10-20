<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Livraria;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Lista todas as avaliações com o relacionamento 1:N com livros
     */
    public function index()
    {
        $dados = Avaliacao::with('livro')->orderBy('id', 'desc')->get(); 
        return view('avaliacao.list', compact('dados'));
    }

    /**
     * Abre formulário para registrar uma nova avaliação com lista de livros disponíveis
     */
    public function create(Request $request)
    {
        $livros = Livraria::orderBy('nome')->get();
        $selectedLivroId = $request->get('livro_id');
        return view('avaliacao.form', compact('livros', 'selectedLivroId'));
    }

    /**
     * Validação padronizada com obrigatoriedade do livro relacionado (1:N) e do texto da resenha
     */
    private function validateForm(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livraria,id',
            'avaliacao' => 'required|string|min:10',
            'autor' => 'nullable|string|max:100',
            'data' => 'nullable|date',
        ], [
            'livro_id.required' => 'Selecione o livro que você está avaliando.',
            'livro_id.exists' => 'O livro selecionado não existe em nosso catálogo.',
            'avaliacao.required' => 'O texto da avaliação é obrigatório.',
            'avaliacao.min' => 'A avaliação deve conter no mínimo 10 caracteres.',
        ]);
    }

    /**
     * Salva a avaliação atrelada a um livro específico (1:N)
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        Avaliacao::create($request->all());

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação registrada com sucesso!');
    }

    /**
     * Carrega a avaliação e a lista de livros para edição
     */
    public function edit(int $id)
    {
        $data = Avaliacao::with('livro')->findOrFail($id);
        $livros = Livraria::orderBy('nome')->get();
        return view('avaliacao.form', compact('data', 'livros'));
    }

    /**
     * Salva as alterações na avaliação
     */
    public function update(Request $request, int $id)
    {
        $this->validateForm($request);

        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->update($request->all());

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação atualizada com sucesso!');
    }

    /**
     * Exclui a avaliação do banco
     */
    public function destroy(int $id)
    {
        Avaliacao::destroy($id);

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação removida com sucesso!');
    }

    /**
     * Realiza busca filtrada por Livro (título), Autor da resenha ou conteúdo do texto
     */
    public function search(Request $request)
    {
        $tipo = $request->input('tipo', 'livro');
        $valor = $request->input('valor');

        $query = Avaliacao::with('livro');

        if (!empty($valor)) {
            if ($tipo === 'livro') {
                $query->whereHas('livro', function ($q) use ($valor) {
                    $q->where('nome', 'like', "%{$valor}%");
                });
            } else {
                $campo = in_array($tipo, ['autor', 'avaliacao']) ? $tipo : 'avaliacao';
                $query->where($campo, 'like', "%{$valor}%");
            }
        }

        $dados = $query->orderBy('id', 'desc')->get();

        return view('avaliacao.list', compact('dados'));
    }
}