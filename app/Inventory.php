<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = [
        'name', 'location', 'state',
    ];

    protected $hidden = [
        'id',
    ];
}
