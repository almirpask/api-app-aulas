<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alternativa;
use App\Questionario;
use App\Resposta;
class RelatorioController extends Controller
{
    public function relatorio_home(){
        $questionarios = Questionario::count();
        $acertos = Resposta::where('status', 1)->count();
        $erros = Resposta::where('status', 0)->count();
        $respostas = Resposta::count();
        $res = [
            'questionarios'=>$questionarios,
            'acertos'=>$acertos,
            'erros'=>$erros,
            'respostas'=>$respostas
            ];

        return json_encode($res);
    }
}
