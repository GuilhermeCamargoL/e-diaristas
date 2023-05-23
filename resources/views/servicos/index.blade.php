@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Serviços</h1>
@stop

@section('content')
@include('_mensagens_sessao')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($servicos as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td><a href="{{ route('servicos.edit', $item->id) }}"><i class="fas fa-eye btn btn-sm btn-dark"></i></a></td>
                </tr>
            @empty
                <tr>
                    <th></th>
                    <th>Nenhum registro encontrado</th>
                    <th></th>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$servicos->links()}}
    </div>

    <div class="float-right">
        <a href="{{route('servicos.create')}}" class="btn btn-success">Novo serviço</a>
    </div>
@stop
