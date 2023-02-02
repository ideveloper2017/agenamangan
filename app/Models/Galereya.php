<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galereya extends Model
{
    use HasFactory;
    protected $table ='galereyas';

    protected $fillable =[
        'title',
        'image',
    ];

}
