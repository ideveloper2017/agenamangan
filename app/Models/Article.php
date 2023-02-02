<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';
    protected $fillable = ['title','category_id', 'content', 'meta_keywords', 'meta_description', 'is_published'];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags', 'articles_tags');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Categories', 'id', 'category_id');
    }


    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'article/'.$this->attributes['slug'];
    }
}
