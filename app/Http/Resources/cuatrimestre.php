<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class cuatrimestre extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cuatrimestre' => $this->cuatrimestre,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_termino' => $this->fecha_inicio,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
