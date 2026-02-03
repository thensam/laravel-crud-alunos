<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Aluno;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with('aluno')->get();
        $alunos = Aluno::all();
        
        return view('tarefas.index', compact('tarefas', 'alunos'));
    }

    public function store(Request $request)
    {
        Tarefa::create($request->all());
        return back();
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return back();
    }

    public function check(Tarefa $tarefa)
{
    $tarefa->update([
        'concluida' => !$tarefa->concluida
    ]);

    return back();
}
}