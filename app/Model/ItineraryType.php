<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItineraryType extends Model
{
    protected $fillable = ['package_id','title'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function items()
    {
        return $this->hasMany(Itinerary::class,'itinerary_types_id','id');
    }
}
