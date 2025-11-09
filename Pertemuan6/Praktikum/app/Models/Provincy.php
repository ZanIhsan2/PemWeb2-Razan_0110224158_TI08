<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincy extends Model
{
    protected $table = 'provincies';
    protected $fillable = [
        'name',
        'alt_name',
        'latitude',
        'longitude',
    ];
}
