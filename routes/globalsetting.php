<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalSetting\FinancialSetting\FinancialController;
use App\Http\Controllers\GlobalSetting\DeleteRecord;
use App\Http\Controllers\GlobalSetting\School\SchoolController;

Route::prefix('GlobalSetting/MasterAdmin/financial-year')->group(function() {
    Route::get('index', [FinancialController::class, 'index'])->name('admin.global-setting.financialYear');
    Route::post('create', [FinancialController::class, 'store'])->name('admin.global-setting.create-financialYear');
    Route::get('admin/global-setting/edit/financialYear/{id}',[FinancialController::class,'edit'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
    Route::put('admin/global-setting/edit/financialYear/{id}',[FinancialController::class,'update'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
})->middleware(['auth', 'verified']);


Route::prefix('GlobalSetting/MasterAdmin/school')->group(function() {
    Route::get('index', [SchoolController::class, 'index'])->name('admin.global-setting.school');
    Route::post('create', [SchoolController::class, 'store'])->name('admin.global-setting.create-school');
    Route::get('admin/global-setting/edit/school/{id}',[SchoolController::class,'edit'])->name('admin.global-setting.edit.school')->middleware(['auth','verified']);
    Route::put('admin/global-setting/edit/school/{id}',[SchoolController::class,'update'])->name('admin.global-setting.edit.school')->middleware(['auth','verified']);
})->middleware(['auth', 'verified']);


// Delete Record Url
Route::get('RecordDelete/{id}/{table_name}/delete',[DeleteRecord::class,'DeleteRecord'])->name('RecordDelete');