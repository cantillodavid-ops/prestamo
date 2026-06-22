<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $buscar = request('buscar');
        $query = Equipo::query();
        
        if ($buscar) {
            $query->where(function($q) use ($buscar) {
                $q->where('nombre', 'like', '%'.$buscar.'%')
                  ->orWhere('codigo', 'like', '%'.$buscar.'%');
            });
        }
        $equipos = $query->get();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'    => 'required|unique:equipos',
            'nombre'    => 'required',
            'categoria' => 'required',
            'marca'     => 'required',
            'estado'    => 'required|in:Disponible,Prestado,Mantenimiento',
        ]);

        Equipo::create($request->all());
        return redirect('/equipos')->with('success', 'Equipo creado.');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'codigo'    => 'required|unique:equipos,codigo,'.$equipo->id,
            'nombre'    => 'required',
            'categoria' => 'required',
            'marca'     => 'required',
            'estado'    => 'required|in:Disponible,Prestado,Mantenimiento',
        ]);

        $equipo->update($request->all());
        return redirect('/equipos')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Equipo $equipo)
    {
        Equipo::destroy($equipo->id);
        return redirect('/equipos')->with('success', 'Equipo eliminado.');
    }
}