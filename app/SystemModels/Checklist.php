<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    //
    protected $fillable = [
        'app_id','staff_id','building_plan',
        'tax_clearance','site_analysis_report',
        'site_plan','c_of_o',
        'power_of_attoney','capitation_rate',
        'invoice_for_payment','sir',
        'hor','engr_report',
        'ppi_certification','assessment_sheet',
    ];
}
