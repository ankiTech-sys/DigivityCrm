<?php

namespace App\Http\Controllers\GlobalSetting\FinancialSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlobalSetting\MasterSetting\Financial\FinancialYearRequest;
use App\Models\GlobalSetting\Financial\MsterSetting\FinancialYearModel;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin_panel.module.globalsetting.financial.Masteradmin.index');
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
            $newData=new FinancialYearModel();
          if($newData->create($request->validated()))
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
        return back()->with($financialyear);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinancialYearRequest $request, string $id)
    {
        $newData=FinancialYearModel::find($id);
      if($newData->update($request->validated()))
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
    public function destroy(string $id)
    {
        $result=FinancialYearModel::find($id)->delete();
        if($result)
        {
            return response()->json(['success'=>'Financial Year Deleted Successfully Done']);
        }
        else{
            return response()->json(['error'=>'Financial Not Year Deleted Successfully Done']);
        }
    }
}
