@extends('adminlte::page')

@section('title', 'E-diaristas')

@section('content_header')
    <h1>E-diaristas</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-body">
                <div class="row align-items-center gy-3">
                    <div class="col-md-8">
                        <h2 class="mb-2">Painel E-Diaristas</h2>
                        <span class="text-muted d-block">Acompanhe os números e acesse rapidamente os principais cadastros.</span>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="{{ route('servicos.index') }}" class="btn btn-primary">Serviços</a>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary">Usuários</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-4">
                    <h5 class="mb-1 fw-semibold">Serviços</h5>
                    <div class="text-muted">Total de serviços cadastrados</div>
                </div>
                <div class="display-6">{{ $servicosCount }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-4">
                    <h5 class="mb-1 fw-semibold">Usuários</h5>
                    <div class="text-muted">Contas de administradores</div>
                </div>
                <div class="display-6">{{ $usuariosCount }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-4">
                    <h5 class="mb-1 fw-semibold">Ranking</h5>
                    <div class="text-muted">Melhores diaristas por avaliação</div>
                </div>
                <div class="display-6">Top {{ $topDiaristas->count() }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-lg-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="mb-3">Melhores diaristas</h5>
                <ul class="list-group list-group-flush">
                    @forelse ($topDiaristas as $diarista)
                        @php
                            $menorValor = $diarista->servicos->min(function ($servico) {
                                return $servico->pivot->valor;
                            });
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0 border-bottom">
                            <div>
                                <strong>{{ $diarista->nome_completo }}</strong>
                                <div class="text-muted small">{{ $diarista->telefone }} · {{ $diarista->chave_pix }}</div>
                                @if (!is_null($menorValor))
                                    <div class="text-muted small">A partir de R$ {{ number_format($menorValor, 2, ',', '.') }} · {{ $diarista->servicos->count() }} serviços</div>
                                @endif
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $diarista->reputacao }}★</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Nenhuma diarista cadastrada ainda.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="mb-3">Ações rápidas</h5>
                    <p class="text-muted mb-4">Atalhos do dia a dia para cadastro, consulta e documentação técnica.</p>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('servicos.index') }}" class="btn btn-primary">Ver serviços</a>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Ver usuários</a>
                    <a href="{{ route('servicos.create') }}" class="btn btn-success">Novo serviço</a>
                    <a href="{{ route('api.docs') }}" class="btn btn-outline-dark">Documentação do desenvolvedor</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
