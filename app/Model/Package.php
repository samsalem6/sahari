<?php

namespace App\Model;

use App\Model\Icon;
use App\Model\Itinerary;
use App\Model\Destination;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function icons()
    {
        return $this->hasMany(Icon::class,'package_id','id');
    }

    public function itineraries()
    {
        return $this->hasMany(ItineraryType::class,'package_id','id');
    }

    public function Gallery()
    {
        return $this->hasMany(Gallery::class,'package_id','id')->orderBy('order');;
    }

    public function General()
    {
        return $this->hasMany(GeneralPackage::class);
    }

    public function pricingTemplatesPackages()
    {
        return $this->hasMany(PricingTemplatesPackages::class, 'package_id', 'id');
    }
}
