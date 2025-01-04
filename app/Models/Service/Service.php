<?php

namespace App\Models\Service;


use App\Models\Service\traits\ServiceRelations;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use ServiceRelations;

    protected $table = 'services';
    protected $fillable = [
        'name',
        'duration',
        'price'
    ];
}
