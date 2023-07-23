<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'topic_id',
        'content',
    ];

    public function  topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
