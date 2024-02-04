# Crud con implementación simple de cache
    Utiliza una tabla 'alumnos' la cual muestra en la vista a todos los alumnos. 
    Para ello acelera el proceso con cache.

# El cache se actualiza siempre que se realice las tareas de store, update y delete.
    //Actualizar el cache
        $alumnos=Alumnos::all();
        Cache::forget('alumnos');
        Cache::put('alumnos',$alumnos);

 # Objetivo: 
    Llenar con 1 millon de registros y medir el performance con y sin cache.


# Extras:

# Renderizar una vista con cache!
    class ArticlesController extends Controller {
    public function index() {
        if ( Cache::has('articles_index') ) {
            return Cache::get('articles_index');
        } else {
            $news = News::all();
            $cachedData = view('articles.index')->with('articles', $news)->render();
            Cache::put('articles_index', $cachedData);                                         
            return $cachedData;           
        }  
    }
}

# Problemas:
    Tarda mucho en semillar, probado con 10 mil registros unicamente.