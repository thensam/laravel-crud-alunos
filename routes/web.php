<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alunos', AlunoController::class);

Route::resource('tarefas', TarefaController::class);

Route::patch('/tarefas/{tarefa}/check', [TarefaController::class, 'check'])->name('tarefas.check');