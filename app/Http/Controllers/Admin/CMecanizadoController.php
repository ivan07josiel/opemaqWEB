<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CMecanizado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\FuncionarioCMecanizado;

class CMecanizadoController extends Controller
{
    public function index()
    {
        // Selecionando os conj. mecanizados do BD e juntando com trator e implemento 
        $conjuntos = DB::table('c_mecanizados')
                            ->join('tratores', 'tratores.id', '=', 'c_mecanizados.id_trator')
                            ->join('tratores as implementos', 'implementos.id', '=', 'c_mecanizados.id_implemento')
                            ->select('c_mecanizados.*', 'tratores.apelido as trator', 'implementos.apelido as implemento')
                            ->where('c_mecanizados.id_usuario', '=', auth()->user()->id)
                            ->get();
        
        return view('admin.configuracoes.conjuntos.index', [
            'conjuntos' => $conjuntos,
        ]);
    }
    
    public function store(Request $request)
    {
        // Realizando validação dos dados
        $validacao = $this->validacao($request->all());

        // Realiza a validação dos dados
        if ($validacao->fails()) {
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        // Inserindo o campo id_usuario na request para inserção no BD
        $request['id_usuario'] = auth()->user()->id;

        // Inserindo na tabela c_mecanizados
        $store = CMecanizado::create($request->all());
        
        // Verifica se a inserção do conjunto mecanizado ocorreu com sucesso
        if ($store) {
            // Realiza inserções na tabela funcionarios_c_mecanizados
            foreach ($request->funcionarios as $key => $id) {
                FuncionarioCMecanizado::create([
                    'id_c_mecanizado'   => $store->id,
                    'id_usuario'        => auth()->user()->id,
                    'id_funcionario'    => $id,
                ]);
            }

            // Redireciona para página index dos conjuntos com mensagem
            return redirect()->route('conjuntos.index')
                ->with("success", "Conjunto Mecanizado criado com sucesso!");
        }

        // Redireciona para página index dos conjuntos com mensagem de erro
        return redirect()->route('conjuntos.index')
        ->with("error", "Erro ocorrido ao tentar criar Conjunto Mecanizado");

    }

    public function delete($id)
    {
        $this->getConjunto($id)->delete();
        return redirect(route('conjuntos.index'))->with('success', 'Conjunto Mecanizado excluido com sucesso!');
    }

    public function update(Request $request)
    {
        
        // Remove todos os funcionários já cadastrados com id do conjunto mecanizado 
        DB::table('funcionario_c_mecanizados')->where('id_c_mecanizado', $request->id)->delete();

        //Realiza preenchimento da váriavel com funcionarios selecionados para inserção no BD
        $funcionarios = array();
        foreach ($request->funcionarios as $key => $id) {
            $funcionarios[$id] = array(
                'id_funcionario' => $id,
                'id_usuario' => auth()->user()->id,
                'id_c_mecanizado' => $request->id,
            );
        }

        // Inserindo os funcionários selecionados no BD
        FuncionarioCMecanizado::insert($funcionarios);

        // Obtém o conjunto mecanizado pelo id e atualizada seus dados 
        $conjunto = $this->getConjunto($request->id);
        $conjunto->update($request->all());

        return redirect(route('conjuntos.index'))->with('success', 'Conjunto Mecanizado editado com sucesso!');
    }

    public function cadastrarView()
    {
        $funcionarios = auth()->user()->funcionarios;
        $tratores = $this->getTratores();
        $implementos = $this->getImplementos();

        return view('admin.configuracoes.conjuntos.cadastrar', [
            'funcionarios'  => $funcionarios,
            'tratores'      => $tratores,
            'implementos'   => $implementos,
        ]);
    }

    public function editarView($id)
    {
        $conjunto = $this->getConjunto($id);
        $tratores = $this->getTratores();
        $implementos = $this->getImplementos();
        $funcionarios = $this->getFuncionariosAll($id);
        $funcionariosSelected = $this->getFuncionariosSelected($id);

        //dd($funcionariosSelected[0]->id_funcionario);

        return view('admin.configuracoes.conjuntos.editar', [
            'conjunto'   => $conjunto,
            'tratores'      => $tratores,
            'implementos'   => $implementos,
            'funcionarios'  => $funcionarios,
            'funcionariosSelected'  => $funcionariosSelected,
        ]);
    }

    public function excluirView($id)
    {
        // Selecionando o conj. mecanizado do BD e juntando com trator e implemento 
        $conjunto = DB::table('c_mecanizados')
                            ->join('tratores', 'tratores.id', '=', 'c_mecanizados.id_trator')
                            ->join('tratores as implementos', 'implementos.id', '=', 'c_mecanizados.id_implemento')
                            ->select('c_mecanizados.id', 'c_mecanizados.apelido', 'tratores.apelido as trator', 'implementos.apelido as implemento')
                            ->where('c_mecanizados.id', '=', $id, 'AND', 'c_mecanizados.id_usuario', '=', auth()->user()->id)
                            ->get();

        //dd($conjunto);
        return view('admin.configuracoes.conjuntos.deletar', [
            'conjunto' => $conjunto->first(),
        ]);
    }

    // Retorna o conjunto mecanizado que corresponde ao id passado
    protected function getConjunto($id){
        return auth()->user()->c_mecanizados->find($id);
    }

    // Retorna lista de tratores cadastrados pelo usuário
    protected function getTratores(){
        return DB::table('tratores')
                    ->select('tratores.apelido', 'tratores.id')
                    ->where('tratores.etrator', '=', 1, 'AND', 'tratores.id_usuario', '=', auth()->user()->id)
                    ->get();
    }

    // Retorna lista de implementos cadastrados pelo usuário
    protected function getImplementos(){
        return DB::table('tratores')
                    ->select('tratores.apelido', 'tratores.id')
                    ->where('tratores.etrator', '=', 0, 'AND', 'tratores.id_usuario', '=', auth()->user()->id)
                    ->get();
    }
    
    // Funcionarios que pertencem ao conjunto mecanizado
    protected function getFuncionariosSelected($id){
        return DB::table('funcionario_c_mecanizados as fcm')
                    ->select('fcm.id_funcionario')
                    ->where('fcm.id_c_mecanizado', '=', $id, 'AND', 'fcm.id_usuario', '=', auth()->user()->id)
                    ->get();
    }
    
    // Recupera os funcionários cadastrados
    protected function getFuncionariosAll($id){
        return DB::table('funcionarios')
                    ->select('funcionarios.id', 'funcionarios.nome')
                    ->where('funcionarios.id_usuario', '=', auth()->user()->id)
                    ->get();
    }

    // Realiza validação dos dados passados
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
