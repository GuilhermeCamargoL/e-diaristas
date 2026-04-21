@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Serviços</h1>
@stop

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <p class="text-muted mb-2">Tabela de serviços cadastrados.</p>
    </div>
    <a href="{{route('servicos.create')}}" class="btn btn-success btn-lg">Novo serviço</a>
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
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicos as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nome}}</td>
                            <td class="text-end">
                                <a href="{{ route('servicos.edit', $item->id) }}" class="btn btn-sm btn-dark px-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{$servicos->links()}}
</div>

@stop
