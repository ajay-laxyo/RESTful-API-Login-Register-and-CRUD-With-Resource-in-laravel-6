<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'Emp id' => $this->id,
            'Emp Name' => $this->name,
            'Emp Email Id' => $this->email,
            'Emp Password' => $this->password,
            'Emp Mobile' => $this->mobile,
            'Emp Address' => $this->address,
            'Emp Created date' => $this->created_at,
            'Emp Updated date' => $this->updated_at,
        ];
    }
}
