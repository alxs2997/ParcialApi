<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Http\Resources\Comic as ComicResource;

class ComicsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get comits
        $comics=Comic::all();
        return ComicResource::collection($comics);
    }
    public function show($id)
    {
        //get comics por id
        $comics = Comic::findOrFail($id);
        return new ComicResource($comics);
    }
    public function store(Request $request)
    {
        //guardar o actualizar
        $comics = $request->isMethod('put') ? Comic::findOrFail($request->id) : new Comic;
        $comics->id = $request->input('id');
        $comics->titulo = $request->input('titulo');
        $comics->Description = $request->input('Description');
        $comics->clasificacion = $request->input('clasificacion');
        $comics->anio = $request->input('anio');
        $comics->Tipo = $request->input('Tipo');



        if($comics->save()){
            return new ComicResource($comics);

        }

    }
    public function destroy($id)
    {
        //borrar comic
        $comics = Comic::findOrFail($id);

        if($comics->delete()){
            return new ComicResource($comics);
        }
    }

}
