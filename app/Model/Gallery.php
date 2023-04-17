<?php

namespace App\Model;

use App\Model\Package;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
