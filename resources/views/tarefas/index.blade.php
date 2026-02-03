<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/lux/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tarefas</h1>
        <a href="{{ route('alunos.index') }}" class="btn btn-outline-dark">Alunos</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4 border-primary">
        <div class="card-body">
            <form action="{{ route('tarefas.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <select name="aluno_id" class="form-select" required>
                        <option value="">Selecione o Aluno</option>
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="descricao" class="form-control" placeholder="O que precisa ser feito?" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Status</th>
                <th>Descrição</th>
                <th>Responsável</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
            <tr class="{{ $tarefa->concluida ? 'table-light' : '' }}">
                <td style="width: 150px;">
                    <form action="{{ route('tarefas.check', $tarefa->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $tarefa->concluida ? 'btn-success' : 'btn-outline-warning' }} w-100">
                            {{ $tarefa->concluida ? '✓ Concluída' : 'Pendente' }}
                        </button>
                    </form>
                </td>
                <td style="{{ $tarefa->concluida ? 'text-decoration: line-through; color: gray;' : '' }}">
                    {{ $tarefa->descricao }}
                </td>
                <td><span class="text-dark fw-bold">{{ $tarefa->aluno->nome }}</span></td>
                <td class="text-end">
                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Apagar tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>