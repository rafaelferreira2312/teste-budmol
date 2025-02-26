<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Exibe o painel de controle do administrador.
     */
    public function dashboard()
    {
        $totalEvents = Event::count();
        $totalRegistrations = Registration::count();

        return view('admin.dashboard', compact('totalEvents', 'totalRegistrations'));
    }
}