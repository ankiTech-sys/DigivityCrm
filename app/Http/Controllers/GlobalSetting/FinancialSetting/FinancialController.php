<?php

namespace App\Http\Controllers\GlobalSetting\FinancialSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlobalSetting\MasterSetting\Financial\FinancialYearRequest;
use App\Models\GlobalSetting\Financial\MsterSetting\FinancialYearModel;
use Illuminate\Support\Facades\Log;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $financialyear=FinancialYearModel::get();
        return view('admin_panel.module.globalsetting.Masteradmin.financial_year',compact('financialyear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 
        public function store(FinancialYearRequest $request)
        {
          $data=$request->validated();
          $data['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
          if(FinancialYearModel::create($data))
          {
            return back()->with(['success'=>'Financial Year Created Successfully Done']);
          }
          else
          {
            return back()->with(['error'=>'Financial Year not Created Successfully Done']);

          }

        }
        
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $financialyear=FinancialYearModel::find($id);
        return view('admin_panel.module.globalsetting.Masteradmin.Edit.edit_financial_year',compact('financialyear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinancialYearRequest $request, string $id)
    {
        $newData=FinancialYearModel::find($id);
        $data=$request->validated();
        $data['is_active']=$request->is_active == 'on' ? 'yes' : 'no';
      if($newData->update($data))
      {
        return back()->with(['success'=>'Financial Year updated Successfully Done']);
      }
      else
      {
        return back()->with(['error'=>'Financial Year not updated Successfully Done']);

      }
    }

    /**
     * Remove the specified resource from storage.
     */
}
