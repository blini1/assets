<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsCollectionResource as NewsCollection;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\NewsRequest as NewsRequest;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/news",
     *     tags={"News"},
     *     summary="List news articles",
     *     security={{"api_token":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="List of news",
     *          @OA\Schema(ref="#/definitions/News")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *          @OA\Schema(ref="#/definitions/Error")
     *   )
     * ),
     */
    public function index()
    {
        $news = News::paginate();
        return (new NewsCollection($news))->response();
    }

    /**
     * @OA\Post(
     *     path="/news",
     *     tags={"News"},
     *     summary="Store new article in news",
     *     security={{"api_token":{}}},
     *     @OA\RequestBody(
     *         description="Input data",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"title", "description", "link", "publication_date", "publisher_name"},
     *                 @OA\Property(
     *                     property="title",
     *                     description="Title to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     description="Description to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="link",
     *                     description="Link to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="publication_date",
     *                     description="Publication date to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="publisher_name",
     *                     description="Publisher name to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/NewsResource"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=422, description="The given data was invalid"),
     * )
     *
     * @param  \Illuminate\Http\Request  $newsRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewsRequest $newsRequest)
    {
        if (News::create($newsRequest->all())) {
            return response()->json([
                'success' => 'News article created successfully'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
    * /**
     * @OA\Get(
     *     path="/news/{id}",
     *     tags={"News"},
     *     summary="Get the specified news article",
     *     security={{"api_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/NewsResource"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Page not found"),
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(News $news)
    {
        return (new NewsResource($news))->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/news/{id}",
     *     tags={"News"},
     *     summary="Update the specified news in db",
     *     security={{"api_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *
     *     @OA\RequestBody(
     *         description="Input data",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"title", "description", "link", "publication_date", "publisher_name"},
     *                 @OA\Property(
     *                     property="title",
     *                     description="Title to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     description="Description to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="link",
     *                     description="Link to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="publication_date",
     *                     description="Publication date to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="publisher_name",
     *                     description="Publisher name to be created",
     *                     maxLength=255,
     *                     type="string",
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/NewsResource"),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Page not found"),
     *     @OA\Response(response=422, description="The given data was invalid"),
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NewsRequest $newsRequest, News $news)
    {
        $news->title = $newsRequest->input('title');
        $news->description = $newsRequest->input('description');
        $news->link = $newsRequest->input('link');
        $news->publication_date = $newsRequest->input('publication_date');
        $news->publisher_name = $newsRequest->input('publisher_name');
        $news->save();

        Log::info("Article with ID {$news->id} updated successfully.");

        return (new NewsResource($news))->response();
    }

    /**
     * Remove the specified resource from storage.
     * @OA\Delete(
     *     path="/news/{id}",
     *     tags={"News"},
     *     summary="Remove the specified news article from db",
     *     security={{"api_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Page not found"),
     * )
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        Log::info("News article with ID {$news->id} deleted successfully.");

        return response('Deleted successfully', 204);
    }
}
