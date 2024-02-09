<?php

namespace App\Models;
use App\Models\prodect;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_showing',
        'is_popular',
        'meta_description',
        'meta_title',
        'meta_keywords',
    ];

    public $translatable = [
        'name',
        'description',
        'meta_description',
        'meta_title'
    ];


    public function prodects()
    {
        return $this->hasMany(prodect::class);
    }
}
