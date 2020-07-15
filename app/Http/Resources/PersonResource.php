<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // You can also transform data in resources keep it in mind stephen
        // return [
        //     'first_name' => $this->first_name,
        //     'last_name' => $this->last_name
        // ];
    }
}
