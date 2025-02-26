@extends('layouts.app')

@section('content')
    <h1>Minhas Inscrições</h1>
    @if ($registrations->isEmpty())
        <p>Você não está inscrito em nenhum evento.</p>
    @else
        <ul>
            @foreach ($registrations as $registration)
                <li>
                    <a href="{{ route('events.show', $registration->event->id) }}">
                        {{ $registration->event->title }}
                    </a>
                    <form action="{{ route('registrations.destroy', $registration->event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Cancelar Inscrição</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Voltar</a>
@endsection