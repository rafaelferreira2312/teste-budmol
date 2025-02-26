@extends('layouts.app')

@section('content')
    <h1>Criar Novo Evento</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Data de Início:</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">Data de Término:</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Localização:</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacidade Máxima:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required min="1">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="open">Aberto para Inscrições</option>
                <option value="closed">Fechado</option>
                <option value="canceled">Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection