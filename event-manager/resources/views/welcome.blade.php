@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Eventos Disponíveis</h1>

    @if ($events->isEmpty())
        <p class="text-center">Nenhum evento disponível no momento.</p>
    @else
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text"><strong>Data:</strong> {{ $event->start_date }} - {{ $event->end_date }}</p>
                            <p class="card-text"><strong>Local:</strong> {{ $event->location }}</p>
                            <p class="card-text"><strong>Vagas:</strong> {{ $event->capacity - $event->registrations->count() }} disponíveis</p>

                            @auth
                                @if ($event->registrations->contains('user_id', Auth::id()))
                                    <form action="{{ route('registrations.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Cancelar Inscrição</button>
                                    </form>
                                @else
                                    <form action="{{ route('registrations.store', $event->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100">Inscrever-se</button>
                                    </form>
                                @endif
                            @else
                                <p class="text-center">Faça <a href="{{ route('login') }}">login</a> para se inscrever.</p>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection