<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Funcionario;
use App\Models\Funcao;

class FuncaoController extends Controller
{
    public function index()
    {
        $funcoes = auth()->user()->funcoes;

        return view('admin.configuracoes.funcoes.index', [
            'funcoes' => $funcoes,
        ]);
    }
    
    public function store(Request $request)
    {
        // Realizando validação dos dados
        $validacao = $this->validacao($request->all());

        if ($validacao->fails()) {
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        // Inserindo o campo id_usuario na request para inserção no BD
        $request['id_usuario'] = auth()->user()->id;

        // Inserindo no BD pessoa
        Funcao::create($request->all());

        // Redireciona para página index dos funcionários com mensagem
        return redirect()->route('funcoes.index')->with("success", "Função criada com sucesso!");

    }

    public function delete($id)
    {
        $this->getFuncao($id)->delete();
        return redirect(route('funcoes.index'))->with('sucess', 'Excluido!');
    }

    public function update(Request $request)
    {
        $funcao = $this->getFuncao($request->id);
        $funcao->update($request->all());

        return redirect(route('funcoes.index'))->with('sucess', 'Editado!');
    }

    public function cadastrarView()
    {
        $funcoes = auth()->user()->funcoes;

        return view('admin.configuracoes.funcoes.cadastrar');
    }

    public function editarView($id)
    {
        $funcao = $this->getFuncao($id);

        return view('admin.configuracoes.funcoes.editar', [
            'funcao' => $funcao,
        ]);
    }

    public function excluirView($id)
    {
        $funcao = $this->getFuncao($id);
        return view('admin.configuracoes.funcoes.deletar', [
            'funcao' => $funcao,
        ]);
    }

    protected function getFuncao($id){
        return auth()->user()->funcoes->find($id);
    }

    private function validacao($data){
        // Define as regras 
        $regras['nome'] = 'required|min:3';

        // Define as mensagens para cada regra
        $mensagens = [
            'nome.required' => "Campo obrigatorio",
            'nome.min' => "Campo nome deve ter ao menos 3 letras",
          ];

        return Validator::make($data, $regras, $mensagens);
    }
}
