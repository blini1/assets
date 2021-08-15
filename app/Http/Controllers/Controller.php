<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Docmentation for news-api",
     *      description="OpenApi description",
     *      @OA\Contact(
     *          email="blinbakija@gmail.com"
     *      )
     * ),
     * @QA\Definition(
     *              definition="Timestamps",
     *              @QA\Property(
     *                  property="created_at",
     *                  type="string",
     *                  format="date-time",
     *                  description="Creation date",
     *                  example="2021-08-01 00:00:00"
     *              ),
     *              @QA\Property(
     *                  property="updated_at",
     *                  type="string",
     *                  format="date-time",
     *                  description="Last updated",
     *                  example="2021-08-01 00:00:00"
     *              )
     *          )
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Projects",
     *     description="API Endpoints of Projects"
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
