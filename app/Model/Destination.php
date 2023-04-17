<?php

namespace App\Model;

use App\Model\Package;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded = [];

    public function packages()
    {
        return $this->hasMany(Package::class,'destination_id','id');
    }
}
