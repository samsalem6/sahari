<?php

namespace App\Model;

use App\Model\WikiList;
use App\Model\RelatedWiki;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    protected $guarded = [];
    protected $fillable = ['destination_id'];
    public function items()
    {
        return $this->hasMany(WikiList::class,'wiki_id','id')->orderBy('order');
    }

    public function Related()
    {
        return $this->hasMany(RelatedWiki::class,'wiki_id','id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class,'destination_id');
    }
}
