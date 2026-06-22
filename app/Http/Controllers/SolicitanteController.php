<?php
namespace App\Http\Controllers;

use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function index()
    {
        $query = Solicitante::query();
        
        if ($buscar = request()->get('buscar')) {
            $query->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('documento', 'like', "%{$buscar}%");
        }
        $solicitantes = $query->get();

        return view('solicitantes.index', compact('solicitantes'));
    }

    public function create()
    {
        return view('solicitantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'documento' => 'required|unique:solicitantes',
            'correo'    => 'required|email|unique:solicitantes',
            'tipo'      => 'required|in:Estudiante,Docente',
        ]);

        Solicitante::create($request->all());
        return redirect()->route('solicitantes.index')->with('success', 'Solicitante creado.');
    }

    public function edit(Solicitante $solicitante)
    {
        return view('solicitantes.edit', compact('solicitante'));
    }

    public function update(Request $request, Solicitante $solicitante)
    {
        $request->validate([
            'nombre'    => 'required',
            'documento' => 'required|unique:solicitantes,documento,'.$solicitante->id,
            'correo'    => 'required|email|unique:solicitantes,correo,'.$solicitante->id,
            'tipo'      => 'required|in:Estudiante,Docente',
        ]);

        $solicitante->update($request->all());
        return redirect()->route('solicitantes.index')->with('success', 'Solicitante actualizado.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();
        return redirect()->route('solicitantes.index')->with('success', 'Solicitante eliminado.');
    }
}