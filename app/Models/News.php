<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Http\Traits\ImplementsUuid;

/**
 * Class User
 * @package App\Models
 *
 * @OA\Schema(
 *     description="News model",
 *     @OA\Property(property="id", type="string", description="ID", format="uuid"),
 *     @OA\Property(property="title", type="string", description="Title"),
 *     @OA\Property(property="description", type="string", description="Description"),
 *     @OA\Property(property="link", type="string", description="Link"),
 *     @OA\Property(property="publication_date", type="string", description="Publication date"),
 *     @OA\Property(property="publisher_name", type="string", description="Publication date"),
 *     @OA\Property(property="created_at", type="string", description="Created timestamp"),
 *     @OA\Property(property="updated_at", type="string", description="Updated timestamp"),
 * )
 */

class News extends Model
{
    use HasFactory, ImplementsUuid;

    protected $table = 'news';


    protected $fillable = [
        'title', 'description', 'link', 'publication_date', 'publisher_name'
    ];
}
