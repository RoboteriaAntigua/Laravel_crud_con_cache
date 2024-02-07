# Crud con implementación simple de cache
    Utiliza una tabla 'alumnos' la cual muestra en la vista a todos los alumnos. 
    Para ello acelera el proceso con cache. También probamos renderizando la vista.

# El cache se actualiza siempre que se realice las tareas de store, update y delete.
    //Actualizar el cache
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);

# Usamos Benchmark para medir el performance de los metodos del controlador: listar, listarCache y listarRenderCache.
    Benchmark::measure( fn () => //codigo a medir)
    listar -> Muestra una lista con todos los usuarios de forma tradicional
    listarCache -> Muestra una lista con todos los alumnos pero previamente almacenados en cache
    listarRenderCache -> Muestra a todos los alumnos pero almacenado en cache la vista!
    

 # Objetivo: 
    Llenar con 10 mil registros y medir el performance con y sin cache.


# Extras:

# Renderizar una vista con cache!
    class AlumnosController extends Controller {
    public function indexRenderCache() {
        if ( Cache::has('alumnos_index') ) {
            return Cache::get('alumnos_index');
        } else {
            $alumnos = Alumnos::all();
            $cachedData = view('alumnos.index')->with('alumnos', $alumnos)->render();
            Cache::put('alumnos_index', $cachedData);                                         
            return $cachedData;           
        }  
    }
}


# Otras formas de mejorar el performance:
    -> PoneMr en cache las rutas para mejorar el performance:
        php artisan route:cache
        php artisan route:clear

    -> Poner en cache las vistas:
        php artisan view:cache
        php artisan view:clear

    -> Cuando instalamos las dependencias del proyecto, hacerlo en modo --no-dev para subir a produccion:
        composer install --prefer-dist --no-dev -o

    ->Para pequeños end-point 'Lumen'
        Lumen es un microframework desarrollado por el mismo creador de Laravel. Como una versión más ligera de Laravel, Lumen se centra en la velocidad y el rendimiento de los microservicios. Requiere una configuración mínima y parámetros de enrutamiento alternativos al construir aplicaciones web, lo que permite un proceso de desarrollo más rápido.
        Por ejemplo, Lumen puede manejar 100 peticiones por segundo. 

# Conclusiones:
    Para 10 mil registros no pude ver mejoras en el tiempo, de hecho a tardado mas con cache :S
