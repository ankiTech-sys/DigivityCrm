<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth;


use Illuminate\Support\Carbon;
class Record extends Model
{
    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
          
            if (in_array('user_id', $model->fillable)){
                $model->user_id = auth()->user()->id;
            }
            if (in_array('financial_year', $model->fillable)) {
                $model->financial_year = session('id') ?? 1; // Use a default if session value is not set
            }
            
            if (in_array('start_date', $model->fillable)){
                $model->start_date = Carbon::createFromDate($model->start_date)->format('Y-m-d');
            }

            if (in_array('end_date', $model->fillable)){
                $model->end_date = Carbon::createFromDate($model->end_date)->format('Y-m-d');
            }

            if (in_array('dob', $model->fillable)){
                $model->dob = Carbon::createFromDate($model->dob)->format('Y-m-d');
            }
        });

        static::updating(function ($student) {
          
        
        });
    }   
}
