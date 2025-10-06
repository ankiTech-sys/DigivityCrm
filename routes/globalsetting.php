<?php

use App\Http\Controllers\GlobalSetting\FinancialSetting\UpdateFinancialYear;
use App\Http\Controllers\PrefixSettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalSetting\FinancialSetting\FinancialController;
use App\Http\Controllers\GlobalSetting\DeleteRecord;
use App\Http\Controllers\GlobalSetting\School\CourseController;
use App\Http\Controllers\GlobalSetting\School\MapSchoolWithCourse;
use App\Http\Controllers\GlobalSetting\School\SchoolController;
use App\Http\Controllers\GlobalSetting\Certificate\CorrectiveAdviceCategory;

Route::prefix('GlobalSetting/MasterAdmin/financial-year')->group(function() {
    Route::get('index', [FinancialController::class, 'index'])->name('admin.global-setting.financialYear');
    Route::post('create', [FinancialController::class, 'store'])->name('admin.global-setting.create-financialYear');
    Route::get('admin/global-setting/edit/financialYear/{id}',[FinancialController::class,'edit'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
    Route::put('admin/global-setting/edit/financialYear/{id}',[FinancialController::class,'update'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
})->middleware(['auth', 'verified']);

// Session Update
Route::post('admin/global-setting/update/financialYear/',[UpdateFinancialYear::class,'updateSession'])->name('financialYear.update')->middleware(['auth','verified']);

Route::prefix('GlobalSetting/MasterAdmin/Categories')->group(function() {
    Route::get('index', [CourseController::class, 'index'])->name('admin.global-setting.service-category');
    Route::post('create', [CourseController::class, 'store'])->name('admin.global-setting.create-service-category');
    Route::get('admin/global-setting/edit/category/{id}',[CourseController::class,'edit'])->name('admin.global-setting.edit.service_category')->middleware(['auth','verified']);
    Route::put('admin/global-setting/edit/category/{id}',[CourseController::class,'update'])->name('admin.global-setting.edit.service_category')->middleware(['auth','verified']);
})->middleware(['auth', 'verified']);




// Delete Record Url
Route::get('RecordDelete/{id}/{table_name}/delete',[DeleteRecord::class,'DeleteRecord'])->name('RecordDelete');


