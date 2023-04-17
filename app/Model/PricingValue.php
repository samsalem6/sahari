<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PricingValue extends Model
{
     // protected $fillable = ['value', 'rows_templates_id', 'columns_templates_id', 'pricing_templates_packages_id'];
    protected $primaryKey = 'id';


    public function rowsTemplates() {
        return $this->belongsTo(RowsTemplates::class, 'rows_templates_id');
    }
    public function columnsTemplates() {
        return $this->belongsTo(ColumnsTemplates::class, 'columns_templates_id');
    }
    public function pricingTemplatesPackages() {
        return $this->belongsTo(PricingTemplatesPackages::class, 'pricing_templates_packages_id');
    }

    public static function findOrderedValuesByPricingTemplatePackage($pricingTemplateProgramId) {
        // $conditions["PricingValue.pricing_templates_packages_id"]=$pricingTemplateProgramId;
        $resultValues= PricingValue::join('rows_templates', 'rows_templates.id', '=', 'pricing_values.rows_templates_id')
        ->join('columns_templates', 'columns_templates.id', '=', 'pricing_values.columns_templates_id')->where('pricing_templates_packages_id', $pricingTemplateProgramId)
        ->orderBy('rows_templates.order', 'asc')->orderBy('columns_templates.order', 'asc')
        ->get(['rows_templates.name as RowName', 'rows_templates.order as RowOrder',
               'columns_templates.name as ColName', 'columns_templates.order as ColOrder',
               'pricing_values.id as PricingValueId','pricing_values.value as PricingValue']);

		return $resultValues;

    }

    public static function findRowNamesByPricingTemplatePackage($pricingTemplateProgramId) {
            $rowNames = PricingValue::join('rows_templates', 'rows_templates.id', '=', 'pricing_values.rows_templates_id')
                ->where('pricing_templates_packages_id', $pricingTemplateProgramId)->orderBy('rows_templates.order')
                ->groupBy('rows_templates.name')
                ->get(['pricing_values.id as PricingValueId', 'rows_templates.name as rowsName']);
            return $rowNames;

    }

}
