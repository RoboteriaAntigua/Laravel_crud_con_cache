<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnosRequest;
use App\Http\Requests\UpdateAlumnosRequest;
use App\Models\Alumnos;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;

class AlumnosController extends Controller
{

    public function index(){
        return view('index');
    }

    /**
     * Listar sin cache.
     */
    public function listar()
    {
        $alumnos = Alumnos::all();
        $tiempo = Benchmark::measure( fn () => $alumnos= Alumnos::all());   //Para medir el tiempo que tarda
        return view('listar', ['alumnos'=>$alumnos, 'tiempo'=>$tiempo]);        
    }

    /* Listar con cache  */
    public function listarCache () {
        if(Cache::has('alumnos')){
            $alumnos = Cache::get('alumnos');
            $tiempo =Benchmark::measure( fn () => Cache::get('alumnos'));   //Para medir el tiempo que tarda
            }else{
                $alumnos=Alumnos::all();  
                Cache::put('alumnos', $alumnos);
                $tiempo = "no estaba en cache aun";  
            }
            return view('listar',['alumnos'=>$alumnos, 'tiempo'=>$tiempo])->with('message','Con los datos en cache');
    }

    /* Poner la vista en cache */
    public function listarRenderCache() {
        if ( Cache::has('alumnos_index') ) {
            return Cache::get('alumnos_index');
        } else {
            $alumnos = Alumnos::all();
            $cachedData = view('listar',['alumnos'=> $alumnos])->with('message','Renderizado en cache')->render();
            Cache::put('alumnos_index', $cachedData);                                         
            return $cachedData;           
        }  
    }

    /* Actualizar caches */
    public function actualizarCache(){
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);

        //Actualizar la vista renderizada en cache
        Cache::forget('alumnos_index');
        $cachedData = view('listar',['alumnos'=> $alumnos])->with('message','actualizado')->render();
        Cache::put('alumnos_index', $cachedData);  
        return redirect('/'); 
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

        return redirect()->route('alumnos.show',['alumno'=>$actualizado])->with('message','Alumnos actualizado correctamente');
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
