<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interactiv extends Model
{
    use HasFactory;
    protected $table ='interactivs';

    protected $fillable =[
        'file',
        'status',
        'interactive_services_id',
    ];

    public function interactive_service()
    {
        return $this->belongsTo(Interactive_service::class,'interactive_services_id','id');
    }
}
