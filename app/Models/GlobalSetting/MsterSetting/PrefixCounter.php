<?php

namespace App\Models\GlobalSetting\MsterSetting;

use Illuminate\Database\Eloquent\Model;

// app/Models/PrefixCounter.php
class PrefixCounter extends Model {
   protected $table = 'billing_forms_setting';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'form_name',
        'prifix',
        'sufix',
        'counter',
    ]; 
}

