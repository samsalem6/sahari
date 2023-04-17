<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PricingTemplates extends Model
{
    protected $fillable = ['name', 'caption', 'order', 'accommodation', 'show_caption'];
    protected $primaryKey = 'id';

    public function columnsTemplates() {
        return $this->hasMany(ColumnsTemplates::class, 'pricing_templates_id');
    }

    public function rowsTemplates() {
        return $this->hasMany(RowsTemplates::class, 'pricing_templates_id');
    }

    public function pricingTemplatesPackages() {
        return $this->hasMany(PricingTemplatesPackages::class);
    }
}
