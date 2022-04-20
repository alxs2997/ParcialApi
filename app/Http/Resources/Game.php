<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=> $this->id,
            'titulo'=>$this->titulo,
            'anio'=>$this->anio,
            'clasificacion'=>$this->clasificacion,
            'clasificacion'=>$this->clasificacion,

        ];
    }
}