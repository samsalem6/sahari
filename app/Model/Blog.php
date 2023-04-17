<?php

namespace App\Model;

use App\Model\Related;
use App\Model\BlogList;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    public function items()
    {
        return $this->hasMany(BlogList::class,'blog_id','id')->orderBy('order');
    }

    public function Related()
    {
        return $this->hasMany(Related::class,'blog_id','id');
    }
}
