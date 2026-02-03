<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/lux/bootstrap.min.css" rel="stylesheet">
<body class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Alunos</h1>
    <div>
        <a href="{{ route('tarefas.index') }}" class="btn btn-outline-dark me-2">Tarefas</a>
        <a href="{{ route('alunos.create') }}" class="btn btn-outline-dark me-2">Novo Aluno</a>
    </div>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->data_nascimento }}</td>
                <td class="d-flex">
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>