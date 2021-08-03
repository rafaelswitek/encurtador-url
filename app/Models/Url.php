<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'url_original',
        'url_encurtada',
        'data_expiracao',
    ];
}
