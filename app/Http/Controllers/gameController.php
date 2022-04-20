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
        //get category by id
        $games = Games::findOrFail($id);
        return new GameResource($games);

    }
}