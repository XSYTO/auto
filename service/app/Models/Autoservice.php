<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoservice extends Model
{
    use HasFactory;

    public function MechanicKid()
    {
        return $this->hasMany('App\Models\Mechanic', 'autoservice_id' , 'id');
    }
    
    public function ServiceKid()
    {
        return $this->hasMany('App\Models\Service', 'autoservice_id' , 'id');
    }  
}
