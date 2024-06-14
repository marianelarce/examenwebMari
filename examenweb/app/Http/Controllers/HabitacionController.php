<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitacionFormRequest;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $habitacion = DB::table('habitacion')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('hotel.habitacion.index', ["habitacion" => $habitacion, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("hotel.habitacion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitacionFormRequest $request)
    {
        $habitacion=new Habitacion;
        $habitacion->tipo=$request->input('tipo');
        $habitacion->numero=$request->input('numero');
        $habitacion->precio=$request->input('precio');
        if ($request->hasFile("fotografia")) {
            $fotografia=$request->file('fotografia');
            $nombreimagen=Str::slug($request->nombre).".".$fotografia->guessExtension();
            $ruta= public_path("/imagen/habitacion/");
            copy($fotografia->getRealPath(),$ruta.$nombreimagen);
            $habitacion->fotografias=$nombreimagen;
        }
        $habitacion->save();
        return redirect()->route('habitacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("hotel.habitacion.edit", ["habitacion" => Habitacion::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitacionFormRequest $request, $id)
    {
        $habitacion=Habitacion::findOrFail($id);
        $habitacion->tipo=$request->input('tipo');
        $habitacion->numero=$request->input('numero');
        $habitacion->precio=$request->input('precio');
        if ($request->hasFile("fotografia")) {
            $fotografia=$request->file('fotografia');
            $nombreimagen=Str::slug($request->nombre).".".$fotografia->guessExtension();
            $ruta= public_path("/imagen/habitacion/");
            copy($fotografia->getRealPath(),$ruta.$nombreimagen);
            $habitacion->fotografias=$nombreimagen;
        }
        $habitacion->update();
        return redirect()->route('habitacion.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $habitacion=habitacion::findOrFail($id);
        $habitacion->delete();
        return redirect()->route('habitacion.index');
    }
}
