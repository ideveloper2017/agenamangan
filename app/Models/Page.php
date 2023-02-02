<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $table = 'pages';
    protected $fillable = ['title', 'content', 'is_published'];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );


    public function setUrlAttribute($value)
    {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'page/'.$this->attributes['slug'];
    }
}
