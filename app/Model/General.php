<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public function info()
    {
        return $this->belongsTo(GeneralPackage::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
