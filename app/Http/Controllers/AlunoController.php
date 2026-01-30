<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno; 

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:alunos,email',
            'data_nascimento' => 'required|date',
        ]);

        Aluno::create($request->all());
        return redirect()->route('alunos.index');
    }

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', compact('aluno'));
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:alunos,email,' . $id,
            'data_nascimento' => 'required|date',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        return redirect()->route('alunos.index');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}