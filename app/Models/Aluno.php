<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome', 'email', 'data_nascimento'];

    public function tarefas()
{
    return $this->hasMany(Tarefa::class);
}
}
