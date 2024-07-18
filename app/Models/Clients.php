<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';

    public function reparations()
    {
        return $this->hasMany(Reparations::class, 'client_id');
    }
}
