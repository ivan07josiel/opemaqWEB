<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\DesempenhoFixo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class DesempenhoFixoController extends Controller
{
    public function index()
    {
        // Selecionando os conj. mecanizados do BD e juntando com trator e implemento 
        $desempenhos = DB::table('desempenho_fixo')
                            ->join('tratores', 'tratores.id', '=', 'desempenho_fixo.id_trator')
                            ->select('desempenho_fixo.custo_fixo_total as custoFixoTotal', 'desempenho_fixo.id', 
                                'tratores.apelido as trator')
                            ->where('desempenho_fixo.id_usuario', '=', auth()->user()->id)
                            ->get();
        
        return view('admin.desempenho.fixo.index', [
            'desempenhos' => $desempenhos,
        ]);
    }


    public function cadastrarView()
    {
        $tratores = auth()->user()->tratores;
        return view('admin.desempenho.fixo.cadastrar', [
            'tratores' => $tratores,
        ]);
    }

    public function getTrator($idOpcional=null, $idTrator=null){
        // Define o id correto para a variavel
        $id = $idOpcional == null ? $idTrator : $idOpcional;
        
        //dd($operacao);
        $trator = DB::table('tratores')
                        ->where('tratores.id', '=', $id) 
                        ->where('tratores.id_usuario', '=', auth()->user()->id)
                        ->get(['tratores.novo', 'tratores.sucata', 'tratores.uso_anual', 'tratores.vida_util',]);
        
        return Response::json($trator);
        
    }
}
