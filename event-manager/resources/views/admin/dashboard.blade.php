@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Painel de Controle</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Eventos</h5>
                    <p class="card-text">{{ $totalEvents }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Inscrições</h5>
                    <p class="card-text">{{ $totalRegistrations }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection