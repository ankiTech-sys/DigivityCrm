<?php

namespace App\Http\Controllers\GlobalSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Exception;

class DeleteRecord extends Controller
{
    public function DeleteRecord($id,$table_name){
        try{
            if (!Schema::hasTable($table_name)) {
                return back()->with(['error' => 'Table not found']);
            }
            $data=DB::table($table_name)->where('id', $id)->update(['deleted_at' => now()]);
            if ($data) {
                return back()->with(['success' => 'Record Deleted Successfully']);
            } else {
                return back()->with(['error' => 'No record found or update failed']);
            }
        }
        catch(Exception $e){
            return back()->with(['error'=>$e->getMessage()]);
        }
       
    }
}
