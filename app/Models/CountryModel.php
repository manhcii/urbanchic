<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'countries';
    protected $guarded = [];
    protected $casts = [
        'json_params' => 'object',
    ];
}
