<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RowsTemplates extends Model
{
    protected $fillable = ['name', 'order'];

    public function pricingTemplates() {
        return $this->belongsTo(PricingTemplates::class);
    }
    public function pricingValue() {
        return $this->hasMany(PricingValue::class, 'rows_templates_id', 'id');
    }
}
