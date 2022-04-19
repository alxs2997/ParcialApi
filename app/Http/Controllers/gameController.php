<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gameController extends Controller
{
    //
    public function store(Request $request)

    {

        //save or update

        $game = $request->isMethod('put') ? Category::findOrFail($request->id) : new Category;

        $game->id = $request->input('id');

        $game->title = $request->input('title');

        $game->description = $request->input('description');



        if($game->save()){

            return new CategoryResource($game);



        }



    }
}
