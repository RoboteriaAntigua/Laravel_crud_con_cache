<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnosRequest;
use App\Http\Requests\UpdateAlumnosRequest;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Cache;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //sin cache
        //$alumnos = Alumnos::all();
        if(Cache::has('alumnos')){
        $alumnos = Cache::get('alumnos');
        }else{
            $alumnos=Alumnos::all();    
        }
        return view('index',['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnosRequest $request)
    {
        /* Forma tradicional
        $alumno = new Alumnos();
        $alumno->nombre = $request->nombre;
        $alumno->curso = $request->curso;
        $alumno->email = $alumno->email;
        $alumno->clave = $alumno->clave;
        $alumno->save();*/

        //Forma abreviada
        Alumnos::create($request->all());
        
        //Actualizar el cache
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);


        return redirect('/')->with('message','Guardado satisfactoriamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $alumno = Alumnos::find($id);
        return view('show',['alumno'=>$alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumnos::find($id);
        return view('edit',['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnosRequest $request, string $id)
    {
        $actualizado = Alumnos::find($id);
        $actualizado->update($request->all());

        //Actualizar el cache
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);

        return view('show',['alumno'=>$actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();

        //Actualizar el cache
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);

        return redirect()->route('alumnos.index')->with('message','Eliminado satisfactoriamente');
    }
}
