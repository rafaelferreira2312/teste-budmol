@extends('layouts.app')

@section('content')
    <h1>Editar Evento</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Data de Início:</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Data de Término:</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}" required>
        </div>
        <div class="form-group">
            <label for="location">Localização:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacidade Máxima:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $event->capacity }}" required min="1">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="open" {{ $event->status == 'open' ? 'selected' : '' }}>Aberto para Inscrições</option>
                <option value="closed" {{ $event->status == 'closed' ? 'selected' : '' }}>Fechado</option>
                <option value="canceled" {{ $event->status == 'canceled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Evento</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection