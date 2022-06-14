<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'smallDescription',
        'imageOne',
        'mainDescription',
        'mainDescriptionOne',
        'imageTwo',
        'pointOne',
        'pointTwo',
        'pointThree',
        'pointFour',
        'mainDescriptionTwo',
        'smallDescriptionOne',
        'smallHeaderOne',
        'smallHeaderTwo',
        'smallHeaderThree',
        'smallDescOne',
        'smallDescTwo',
        'smallDescThree'
    ];

    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
