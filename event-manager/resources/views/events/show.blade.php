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
    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection