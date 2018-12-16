<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Propriedade;

class PropriedadeController extends Controller
{
    public function index()
    {
        $propriedades = auth()->user()->propriedades;

        return view('admin.configuracoes.propriedades.index', [
            'propriedades' => $propriedades,
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
        Propriedade::create($request->all());

        // Redireciona para página index das propriedades com mensagem
        return redirect()->route('propriedades.index')->with("success", "Propriedade criada com sucesso!");

    }

    public function delete($id)
    {
        $this->getPropriedade($id)->delete();
        return redirect(route('propriedades.index'))->with('success', 'Excluido!');
    }

    public function update(Request $request)
    {
        $propriedade = $this->getPropriedade($request->id);
        $propriedade->update($request->all());

        return redirect(route('propriedades.index'))->with('success', 'Editado!');
    }

    public function cadastrarView()
    {
        return view('admin.configuracoes.propriedades.cadastrar');
    }

    public function editarView($id)
    {
        $propriedade = $this->getPropriedade($id);

        return view('admin.configuracoes.propriedades.editar', [
            'propriedade' => $propriedade,
        ]);
    }

    public function excluirView($id)
    {
        $propriedade = $this->getPropriedade($id);
        return view('admin.configuracoes.propriedades.deletar', [
            'propriedade' => $propriedade,
        ]);
    }

    protected function getPropriedade($id){
        return auth()->user()->propriedades->find($id);
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
