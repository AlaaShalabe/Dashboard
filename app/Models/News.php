<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',
        'topic_id',

    ];

    public function  topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function getLocalized($column)
    {
        $locale = App::currentLocale();
        return $this->attributes["{$column}_{$locale}"];
    }

}
