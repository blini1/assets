<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // since the table does not have timestamps
    public $timestamps = false;

    protected $fillable = [
        'title', 'size', 'path'
    ];

    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }
}
