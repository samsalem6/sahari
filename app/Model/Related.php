<?php

namespace App\Model;

use App\Model\Blog;
use App\Model\Package;
use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'Package_id','id');
    }
}
