<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Prestamo;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'disponibles' => Equipo::where('estado', 'Disponible')->count(),
            'prestados'   => Equipo::where('estado', 'Prestado')->count(),
            'total'       => Prestamo::count(),
        ]);
    }
}