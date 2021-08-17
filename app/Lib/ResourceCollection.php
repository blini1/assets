<?php

namespace App\Lib;

/**
 * Class ResourceCollection
 * @package App\Virtual
 */
class ResourceCollection
{
    /**
     * @OA\Schema(
     *     schema="ResourceLinks",
     *     @OA\Property(property="first", type="string", description="First page"),
     *     @OA\Property(property="last", type="string", description="Last page"),
     *     @OA\Property(property="prev", type="string", nullable="true", description="Previous page"),
     *     @OA\Property(property="next", type="string", nullable="true", description="Next page"),
     * )
     */

    /**
     * @OA\Schema(
     *     schema="ResourceMeta",
     *     @OA\Property(property="current_page", type="integer", description="Current page number"),
     *     @OA\Property(property="from", type="integer", description="Number of first item from current page"),
     *     @OA\Property(property="last_page", type="integer", description="Last page number"),
     *     @OA\Property(property="links", type="array", @OA\Items(ref="#/components/schemas/ResourceMetaLinks")),
     *     @OA\Property(property="path", type="string", description="Base URL"),
     *     @OA\Property(property="per_page", type="integer", description="Number of item per page"),
     *     @OA\Property(property="to", type="integer", description="Number of last item from current page"),
     *     @OA\Property(property="total", type="integer", description="Total count of all items"),
     * )
     */

    /**
     * @OA\Schema(
     *     schema="ResourceMetaLinks",
     *     @OA\Property(property="url", type="string", description="Page link"),
     *     @OA\Property(property="label", type="string", description="Page label"),
     *     @OA\Property(property="active", type="boolean", description="Current page flag"),
     * )
     */
}
