<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = ['itinerary_types_id','body','title', 'latitude', 'longitude', 'map_title'];
    // public function package()
    // {
    //     return $this->belongsTo(Package::class);
    // }
    public function ItineraryType()
    {
        return $this->belongsTo(ItineraryType::class);
    }
}
