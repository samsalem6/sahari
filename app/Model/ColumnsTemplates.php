<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ColumnsTemplates extends Model
{
    protected $fillable = [];

    public function pricingTemplates() {
        return $this->belongsTo(PricingTemplates::class);
    }
    public function pricingValue() {
        return $this->hasMany(PricingValue::class, 'columns_templates_id', 'id');
    }
}
