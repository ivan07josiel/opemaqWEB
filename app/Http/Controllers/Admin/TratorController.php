<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Trator;

class TratorController extends Controller
{
    public function index()
    {
        $tratores = auth()->user()->tratores;

        return view('admin.configuracoes.tratores.index', [
            'tratores' => $tratores,
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
        Trator::create($request->all());
        
        // Redireciona para página index das tratores com mensagem
        return redirect()->route('tratores.index')->with("success", "Trator/Implemento criado com sucesso!");      
    }

    public function delete($id)
    {
        $this->getTrator($id)->delete();
        return redirect(route('tratores.index'))->with('success', 'Excluido!');
    }

    public function update(Request $request)
    {
        $trator = $this->getTrator($request->id);
        $trator->update($request->all());

        return redirect(route('tratores.index'))->with('success', 'Editado!');
    }

    public function cadastrarView()
    {
        return view('admin.configuracoes.tratores.cadastrar');
    }

    public function editarView($id)
    {
        $trator = $this->getTrator($id);

        return view('admin.configuracoes.tratores.editar', [
            'trator' => $trator,
        ]);
    }

    public function excluirView($id)
    {
        $trator = $this->getTrator($id);
        return view('admin.configuracoes.tratores.deletar', [
            'trator' => $trator,
        ]);
    }

    protected function getTrator($id){
        return auth()->user()->tratores->find($id);
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

        $regras['apelido'] = 'required|min:3';

        // Define as mensagens para cada regra
        $mensagens = [
            'apelido.required' => "Campo obrigatorio",
            'apelido.min' => "Campo nome deve ter ao menos 3 letras",
            'ddd.required' => "Campo DDD é obrigatório",
            'ddd.size' => "Campo DDD deve ter 2 digitos",
            'telefone.required' => "Campo telefone é obrigatório"
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
