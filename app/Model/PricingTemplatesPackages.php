<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PricingTemplatesPackages extends Model
{
    protected $fillable = ['order','package_id', 'pricing_templates_id'];
    
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function pricingTemplates() {
        return $this->belongsTo(PricingTemplates::class, 'pricing_templates_id');
    }
    public function pricingValue() {
        return $this->hasMany(PricingValue::class, 'pricing_templates_packages_id', 'id');
    }
}
