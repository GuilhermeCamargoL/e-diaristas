@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Serviços</h1>
@stop

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <p class="text-muted mb-2">Usuários cadastrados no painel administrativo.</p>
    </div>
    <a href="{{route('usuarios.create')}}" class="btn btn-success btn-lg">Novo usuário</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        @include('_mensagens_sessao')
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td class="text-end">
                                <a href="{{ route('usuarios.edit', $item) }}" class="btn btn-sm btn-dark px-3 me-2" title="Editar usuário">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('usuarios.destroy', $item) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger px-3" onclick="return confirm('Deseja realmente apagar?')" title="Apagar usuário">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{$usuarios->links()}}
</div>

@stop
