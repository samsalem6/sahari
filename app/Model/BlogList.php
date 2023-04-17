<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogList extends Model
{
    protected $guarded = ['blog_id'];

    public function blogType()
    {
        return $this->belongsTo(Blog::class);
    }
}
