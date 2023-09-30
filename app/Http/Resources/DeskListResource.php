<?php

namespace App\Http\Resources;

use App\Models\Card;
use App\Models\DeskList;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeskListResource extends JsonResource
{

    public function collect($request)
    {
        return $this->cards->collect();
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cards' => $this->cards->map(function ($card) {
                return new CardResource($card);
            }),
        ];
    }
}
