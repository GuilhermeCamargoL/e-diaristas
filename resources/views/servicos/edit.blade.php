@extends('adminlte::page')

@section('title', 'Editar Serviço')

@section('content_header')
    <h1>Editar Serviço</h1>
@stop

@section('content')
    @include('mensagens')
    <form action="{{ route('servicos.update', $servico->id) }}" method="post">
        @method('PUT')
        @include('servicos.form')
    </form>
@stop