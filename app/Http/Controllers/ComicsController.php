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

}
