<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Funcionario;
use App\Models\Funcao;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function index()
    {
        // Selecionando os funcionários do BD e juntando com funcoes 
        $funcionarios = DB::table('funcionarios')
                            ->join('funcoes', 'funcoes.id', '=', 'funcionarios.funcao')
                            ->select('funcionarios.*', 'funcoes.nome as nome_funcao')
                            ->where('funcionarios.id_usuario', '=', auth()->user()->id)
                            ->get();
        
        //$funcionarios = auth()->user()->funcionarios;
        
        $funcoes = auth()->user()->funcoes;

        return view('admin.configuracoes.funcionarios.index', [
            'funcionarios' => $funcionarios,
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
        $store = Funcionario::create($request->all());

        if ($store) {
            // Redireciona para página index dos funcionários com mensagem
            return redirect()->route('funcionarios.index')
                ->with("success", "Funcionário criado com sucesso!");
        }

        // Redireciona para página index dos funcionários com mensagem de erro
        return redirect()->route('funcionarios.index')
        ->with("error", "Funcionário criado com sucesso!");

    }

    public function delete($id)
    {
        $this->getFuncionario($id)->delete();
        return redirect(route('funcionarios.index'))->with('success', 'Funcionário excluido com sucesso!');
    }

    public function update(Request $request)
    {
        $funcionario = $this->getFuncionario($request->id);
        $funcionario->update($request->all());

        return redirect(route('funcionarios.index'))->with('success', 'Funcionário editado com sucesso!');
    }

    public function cadastrarView()
    {
        $funcoes = auth()->user()->funcoes;

        return view('admin.configuracoes.funcionarios.cadastrar', [
            'funcoes' => $funcoes,
        ]);
    }

    public function editarView($id)
    {
        $funcionario = $this->getFuncionario($id);
        $funcoes = auth()->user()->funcoes;

        return view('admin.configuracoes.funcionarios.editar', [
            'funcionario' => $funcionario,
            'funcoes' => $funcoes,
        ]);
    }

    public function excluirView($id)
    {
        $funcionario = $this->getFuncionario($id);
        return view('admin.configuracoes.funcionarios.deletar', [
            'funcionario' => $funcionario,
            'funcao' => auth()->user()->funcoes->find($funcionario->funcao),
        ]);
    }

    protected function getFuncionario($id){
        return auth()->user()->funcionarios->find($id);
    }

    private function validacao($data){
        /* Define as regras 
        if (array_key_exists('ddd', $data) && array_key_exists('telefone', $data)) {
            if ($data['ddd'] || $data['telefone']) {
                $regras['ddd'] = 'required|size:2';
                $regras['telefone'] = 'required';
            }
        }
        */

        $regras['nome'] = 'required|min:3';

        // Define as mensagens para cada regra
        $mensagens = [
            'nome.required' => "Campo obrigatorio",
            'nome.min' => "Campo nome deve ter ao menos 3 letras",
            'ddd.required' => "Campo DDD é obrigatório",
            'ddd.size' => "Campo DDD deve ter 2 digitos",
            'telefone.required' => "Campo telefone é obrigatório"
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
