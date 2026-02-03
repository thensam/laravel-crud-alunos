<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarefa extends Model
{
    protected $fillable = ['aluno_id', 'descricao', 'concluida'];
    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}