<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class UserResourceCollection
 * @package App\Http\Resources
 *
 * @OA\Schema(
 *     description="User resource collection",
 *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/News")),
 *     @OA\Property(property="links", ref="#/components/schemas/ResourceLinks"),
 *     @OA\Property(property="meta", ref="#/components/schemas/ResourceMeta"),
 * )
 */
class NewsCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
