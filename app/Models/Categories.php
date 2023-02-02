<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $fillable =[
        'name',
        'slug',
        'lang',
        'image',
    ];

    public $timestamps = false;
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id','id');
    }

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'category/'.$this->attributes['slug'];
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }
}
