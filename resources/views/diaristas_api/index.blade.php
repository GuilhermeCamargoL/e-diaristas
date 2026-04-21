@extends('adminlte::page')

@section('title', 'Diaristas (API Externa)')

@section('content_header')
    <h1>Diaristas (API Externa)</h1>
@stop

@section('content')
    <div class="alert alert-info">
        <strong>Como funciona:</strong> o cadastro de diaristas é feito pela API externa. Esta tela mostra o espelho desses dados no painel.
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">Endpoints relacionados</h5>
            <ul class="mb-0">
                <li><code>GET /api/diaristas/localidades?cep=01310930</code></li>
                <li><code>GET /api/diaristas/disponibilidade?cep=01310930</code></li>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Reputação</th>
                            <th>Cidades</th>
                            <th>Serviços</th>
                            <th>Preço inicial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($diaristas as $diarista)
                            @php
                                $precoInicial = $diarista->servicos->min(function ($servico) {
                                    return $servico->pivot->valor;
                                });
                            @endphp
                            <tr>
                                <td>
                                    <strong>{{ $diarista->nome_completo }}</strong>
                                    <div class="text-muted small">{{ $diarista->telefone }}</div>
                                </td>
                                <td>{{ $diarista->reputacao }}★</td>
                                <td>{{ $diarista->cidadesAtendidas->count() }}</td>
                                <td>{{ $diarista->servicos->count() }}</td>
                                <td>
                                    @if (!is_null($precoInicial))
                                        R$ {{ number_format($precoInicial, 2, ',', '.') }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Nenhuma diarista encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $diaristas->links() }}
    </div>
@stop
