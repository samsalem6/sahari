<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GeneralPackage extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function General()
    {
        return $this->hasMany(General::class);
    }
}
