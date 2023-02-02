<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Noticia extends Model
{
    use HasFactory;

    public function getAll()
    {
        $db = DB::table('funcionario')->get();
        return $db;

    }
    public function get($id)
    {
        $db = DB::table('funcionario')->where('id','=', $id)->get();
        return $db;
    }

    public function add($nome, $competencia, $cargo, $salario)
    {
      DB::table('funcionario')->insert([
            'nome'=> $nome,
            'competencia'=> $competencia,
            'cargo'=> $cargo,
            'salario'=> $salario,
        ]);
    }

    public function upd($id, $nome, $competencia, $cargo, $salario)
    {
        DB::table('funcionario')->where('id', '=' , $id)->update([
            'nome'=> $nome,
            'competencia'=> $competencia,
            'cargo'=> $cargo,
            'salario'=> $salario,
        ]);
    }
    public function remove($id)
    {
        DB::table('funcionario')->where('id', '=' , $id)->delete();
    }

}
