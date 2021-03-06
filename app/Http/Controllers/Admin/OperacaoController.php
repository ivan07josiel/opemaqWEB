<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Operacao;
use Illuminate\Support\Facades\Validator;

class OperacaoController extends Controller
{
    public function index()
    {
        // Selecionando os funcionários do BD e juntando com funcoes 
        $operacoes = DB::table('operacoes')
                            ->join('propriedades', 'propriedades.id', '=', 'operacoes.id_propriedade')
                            ->select('operacoes.*', 'propriedades.nome as propriedade')
                            ->where('operacoes.id_usuario', '=', auth()->user()->id)
                            ->get();
        
        return view('admin.desempenho.analise.index', [
            'operacoes' => $operacoes,
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
        $store = Operacao::create($request->all());

        if ($store) {
            // Redireciona para página index de analise com mensagem
            return redirect()->route('analise.index')
                ->with("success", "Operação criada com sucesso!");
        }

        // Redireciona para página index de analise com mensagem de erro
        return redirect()->route('analise.index')
        ->with("error", "Operação criada com sucesso!");

    }

    public function delete($id)
    {
        $this->getOperacao($id)->delete();
        return redirect(route('analise.index'))->with('success', 'Operação excluida com sucesso!');
    }

    public function update(Request $request)
    {
        $operacao = $this->getOperacao($request->id);
        $operacao->update($request->all());

        return redirect(route('analise.index'))->with('success', 'Operação editada com sucesso!');
    }

    public function cadastrarView()
    {
        $propriedades = auth()->user()->propriedades;

        return view('admin.desempenho.analise.cadastrar', [
            'propriedades' => $propriedades,
        ]);
    }

    public function editarView($id)
    {
        $operacao = $this->getOperacao($id);
        $propriedades = auth()->user()->propriedades;

        return view('admin.desempenho.analise.editar', [
            'operacao' => $operacao,
            'propriedades' => $propriedades,
        ]);
    }

    public function excluirView($id)
    {
        $operacao = $this->getOperacao($id);
        $propriedade = auth()->user()->propriedades->find($operacao->id_propriedade);
        return view('admin.desempenho.analise.deletar', [
            'operacao' => $operacao,
            'propriedade' => $propriedade,
        ]);
    }

    protected function getOperacao($id){
        return auth()->user()->operacoes->find($id);
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
