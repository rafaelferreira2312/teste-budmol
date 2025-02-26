@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr>

                    <!-- Botões para Administrador -->
                    @if (auth()->user()->isAdmin())
                        <h4 class="mb-3">Painel do Administrador</h4>
                        <div class="d-grid gap-2">
                            <a href="{{ route('events.index') }}" class="btn btn-primary">Gerenciar Eventos</a>
                            <a href="{{ route('registrations.index') }}" class="btn btn-success">Ver Inscrições</a>
                        </div>
                    @else
                        <!-- Botões para Participante -->
                        <h4 class="mb-3">Painel do Participante</h4>
                        <div class="d-grid gap-2">
                            <a href="{{ route('events.index') }}" class="btn btn-primary">Ver Eventos Disponíveis</a>
                            <a href="{{ route('registrations.index') }}" class="btn btn-success">Minhas Inscrições</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection