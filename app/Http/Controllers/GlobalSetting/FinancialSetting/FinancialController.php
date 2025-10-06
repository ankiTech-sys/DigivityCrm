<?php
namespace App\Http\Controllers\GlobalSetting\FinancialSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalSetting\MasterSetting\Financial\FinancialYearRequest;
use App\Models\GlobalSetting\MsterSetting\Financial\FinancialYearModel;
use Dotenv\Validator;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
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

    public function updateSession(Request $request)
    {
        // Validate request
        $data = Validator::make($request->all(), [
            'financial_id' => 'required|exists:financial_year,id'
        ]);
    
        
        if ($data->fails()) {
            return response()->json([
                'error' => $data->errors()
            ], 422);
        }
    
        // Retrieve current session ID
        $currentSessionId = Session::get('id');
    
        // Find the current session and deactivate it
        $currentSession = FinancialYearModel::findOrFail($currentSessionId);
        $currentSession->is_active = 'no';
        $currentSession->save();
    
       
        // Find the new session and activate it
        $newSession = FinancialYearModel::findOrFail($request->financial_id); // Use the validated financial_year
        $newSession->is_active = 'yes';
        $newSession->save();
    
        // Set the new active academic session in the session
        setActiveFinancialSession();
    
        return response()->json(['success' => 'Session updated successfully']);
    }   
}
