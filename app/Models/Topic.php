<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',

    ];
    public function  news()
    {
        return $this->hasMany(News::class);
    }
    public function getLocalized($column)
    {
        $locale = App::currentLocale();
        return $this->attributes["{$column}_{$locale}"];
    }
}
