<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenericResource extends JsonResource
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
            'data' => $this->generics,
        ];
    }

    public function with($request)
    {
        return [
            'latest_date' => $this->latest_date,
        ];
    }
}
