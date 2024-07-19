<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparations extends Model
{
    protected $table = 'reparations';

    protected $fillable = ['appareil', 'description', 'client_id', 'date_depot', 'statut'];

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
