<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Inscreve o usuário autenticado em um evento.
     */
    public function store(Request $request, Event $event)
    {
        // Verifica se o usuário já está inscrito no evento
        if ($event->registrations()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Você já está inscrito neste evento.');
        }

        // Verifica se o evento ainda tem vagas disponíveis
        if ($event->registrations()->count() >= $event->capacity) {
            return redirect()->back()->with('error', 'Este evento já atingiu a capacidade máxima.');
        }

        // Cria a inscrição
        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);

        return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
    }

    /**
     * Cancela a inscrição do usuário autenticado em um evento.
     */
    public function destroy(Event $event)
    {
        // Encontra a inscrição do usuário no evento
        $registration = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($registration) {
            $registration->delete();
            return redirect()->back()->with('success', 'Inscrição cancelada com sucesso!');
        }

        return redirect()->back()->with('error', 'Inscrição não encontrada.');
    }

    /**
     * Exibe a lista de eventos em que o usuário está inscrito.
     */
    public function index()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('event')->get();

        return view('registrations.index', compact('registrations'));
    }
}