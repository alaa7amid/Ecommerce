<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodect extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'slug',
        'short_descriptioon',
        'description',
        'price',
        'selling_price',
        'quantity',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public $translatable = [
        'name',
        'short_descriptioon',
        'description',
        'meta_description'
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}
