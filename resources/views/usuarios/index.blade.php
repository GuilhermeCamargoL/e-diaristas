@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Serviços</h1>
@stop

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $item) }}" class="btn btn-dark"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('usuarios.destroy', $item) }}" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente apagar?')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
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
        {{$usuarios->links()}}
    </div>

    <div class="float-right">
        <a href="{{route('usuarios.create')}}" class="btn btn-success">Novo usuário</a>
    </div>
@stop