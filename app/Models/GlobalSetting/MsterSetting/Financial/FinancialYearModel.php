<?php

namespace App\Models\GlobalSetting\MsterSetting\Financial;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record;

class FinancialYearModel extends Record
{

   use SoftDeletes;
   protected $table="financial_year";
   protected $primaryKey="id";
   protected $fillable=[
    'financial_session',
    'start_date',
    'end_date',
    'is_active',
    'crated_at',
    'updated_at'
   ];
}
