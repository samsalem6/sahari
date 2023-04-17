<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RelatedWiki extends Model
{
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Wiki::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'Package_id','id');
    }
}
