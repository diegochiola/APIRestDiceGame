<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        /*return $this->collection->map(function ($game) {
            return [
                'id' => $game->id,
                'dice1' => $game->dice1,
                'dice2' => $game->dice2,
                'won' => $game->won,
                'user_id' => $game->user_id,
                'created_at' => $game->created_at,
                'updated_at' => $game->updated_at,
            ];
        });*/
    }
}
