<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    //
    public function viewDashboard()
    {
        $db = new Noticia;
        $x = $db->getAll();
        return view('dashboard',['resultado'=>$x, 'tipo'=>'get']);
    }
    public function viewEditar(Request $request)
    {
        $show = new Noticia;
        $result = $show->get($request->id);
        return view('dashboard',['resultado'=>$result, 'tipo'=>'editar']);
    }
    public function adicionarFuncionario(Request $request)
    {
        $adicionar = new Noticia;

        $adicionar->add($request->nome, $request->competencia, $request->cargo, $request->salario);
        return $this->viewDashboard();
    }
    public function deletarFuncionario(Request $request)
    {
        $deletar = new Noticia;
        $deletar->remove($request->id);
        return $this->viewDashboard();
    }
    public function atualizarFuncionario(Request $request)
    {
        $atualizar = new Noticia;
        $atualizar->upd($request->id, $request->nome, $request->competencia,$request->cargo, $request->salario);
        return $this->viewDashboard();
    }
}
