@extends('layouts.app')

@section('content')
    <h1>{{ $event->title }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Descrição:</strong> {{ $event->description }}</p>
            <p><strong>Data de Início:</strong> {{ $event->start_date }}</p>
            <p><strong>Data de Término:</strong> {{ $event->end_date }}</p>
            <p><strong>Localização:</strong> {{ $event->location }}</p>
            <p><strong>Capacidade Máxima:</strong> {{ $event->capacity }}</p>
            <p><strong>Status:</strong> {{ ucfirst($event->status) }}</p>
        </div>
    </div>

    @if (Auth::check() && $event->status === 'open')
        @if ($event->registrations()->where('user_id', Auth::id())->exists())
            <form action="{{ route('registrations.destroy', $event->id) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
            </form>
        @else
            <form action="{{ route('registrations.store', $event->id) }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-primary">Inscrever-se</button>
            </form>
        @endif
    @endif

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection