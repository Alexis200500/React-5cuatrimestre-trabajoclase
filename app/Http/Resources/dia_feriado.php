<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class dia_feriado extends JsonResource
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
            'dia_feriado' => $this->dia_feriado,

        ];
    }
}
