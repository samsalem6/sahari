<?php

namespace App\Model;

use App\Model\Package;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['package_id','icon','title'];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}