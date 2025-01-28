<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalSetting\FinancialSetting\FinancialController;


Route::prefix('GlobalSetting/MasterAdmin/financial-year')->group(function(){
    Route::get('index',[FinancialController::class,'index'])->name('admin.global-setting.financialYear');
})->middleware(['auth','verifyied']);

?>