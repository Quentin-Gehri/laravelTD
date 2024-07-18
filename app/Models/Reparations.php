<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparations extends Model
{
    protected $table = 'reparations';

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'id');
    }
}

