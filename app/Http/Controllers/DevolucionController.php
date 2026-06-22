<?php
namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function update(Prestamo $prestamo)
    {
        $prestamo->update(['fecha_devolucion_real' => now()]);
        $prestamo->equipo->update(['estado' => 'Disponible']);

        return redirect()->route('prestamos.index')->with('success', 'Devolución registrada.');
    }
}
