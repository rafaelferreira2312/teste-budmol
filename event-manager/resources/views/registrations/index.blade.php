@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Minhas Inscrições</h1>

    @if ($registrations->isEmpty())
        <p class="text-center">Você não está inscrito em nenhum evento.</p>
    @else
        <div class="row">
            @foreach ($registrations as $registration)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $registration->event->title }}</h5>
                            <p class="card-text">{{ $registration->event->description }}</p>
                            <p class="card-text"><strong>Data:</strong> {{ $registration->event->start_date }} - {{ $registration->event->end_date }}</p>
                            <p class="card-text"><strong>Local:</strong> {{ $registration->event->location }}</p>

                            <form action="{{ route('registrations.destroy', $registration->event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection