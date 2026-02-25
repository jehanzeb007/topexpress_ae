<?php

namespace Botble\Location\Http\Resources;

use Botble\Location\Models\Neighbourhood;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin City
 */
class NeighbourhoodResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->name,
        ];
    }
}
