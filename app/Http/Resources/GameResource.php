<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'dice1' => $this->dice1,
            'dice2' => $this->dice2,
            'won' => $this->won,
            'created_at' =>$this->created_at,
            'updated_at' =>$this->updated_at
        ];
    }
}
