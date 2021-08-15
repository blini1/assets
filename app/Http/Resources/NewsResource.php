<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class NewsResource
 * @package App\Http\Resources
 *
 * @OA\Schema(
 *     description="News resource",
 *     @OA\Property(property="data", ref="#/components/schemas/News"),
 * )
 */

class NewsResource extends JsonResource
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
    }
}
