@extends('layouts.app')

@section('content')
    <h1>Eventos</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Criar Evento</a>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection