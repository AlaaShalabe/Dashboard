<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_ar',
        'user_id',
        'content_en',
        'content_ar',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getLocalized($column)
    {
        $locale = App::currentLocale();
        return $this->attributes["{$column}_{$locale}"];
    }
}
