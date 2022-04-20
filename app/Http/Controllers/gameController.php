<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Resources\Game as GameResource;

class GameController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar juegos
        $games=Game::all();
        return GameResource::collection($games);
    }
    public function show($id)
    {
        //get games by id
        $games = Games::findOrFail($id);
        return new GameResource($games);

    }
    public function store(Request $request)
    {
        //guardar o actualizar
        $games = $request->isMethod('put') ? Game::findOrFail($request->id) : new Game;
        $games->id = $request->input('id');
        $games->titulo = $request->input('titulo');
        $games->Description = $request->input('Description');
        $games->clasificacion = $request->input('clasificacion');
        $games->anio = $request->input('anio');
        $games->Tipo = $request->input('Tipo');



        if($games->save()){
            return new GameResource($games);

        }

    }
    public function destroy($id)
    {
        //borrar juego
        $games = Game::findOrFail($id);

        if($games->delete()){
            return new GameResource($games);
        }
    }
}