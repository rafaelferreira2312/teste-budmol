<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lista todos os eventos
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Exibe o formulário para criar um novo evento
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'nullable|string|in:open,closed,canceled',
        ]);

        // Cria um novo evento no banco de dados
        Event::create($request->all());

        // Redireciona para a lista de eventos com uma mensagem de sucesso
        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Exibe os detalhes de um evento específico
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Exibe o formulário para editar um evento
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Valida os dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'nullable|string|in:open,closed,canceled',
        ]);

        // Atualiza o evento no banco de dados
        $event->update($request->all());

        // Redireciona para a lista de eventos com uma mensagem de sucesso
        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Exclui o evento do banco de dados
        $event->delete();

        // Redireciona para a lista de eventos com uma mensagem de sucesso
        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }
}