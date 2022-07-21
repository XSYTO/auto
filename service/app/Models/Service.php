<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function ServiceParent()
    {
        return $this->belongsTo('App\Models\Autoservice' , 'autoservice_id', 'id');
    }
}
