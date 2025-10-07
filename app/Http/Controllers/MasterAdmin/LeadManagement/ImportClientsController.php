<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportClientsController extends Controller
{
    // Index Function For The Show Import Blade
    public function index()
    {
        return view('admin_panel.module.leadmanagement.MasterAdmin.import-client');
    }

    public function clientspreview(Request $request)
    {

        $request->validate([
            'import_file' => 'required|mimes:csv,txt',
        ]);

        

        $file = $request->file('import_file');
    

        $headers = [];
        $clientsData = [];

        if (($handle = fopen($file->getRealPath(), 'r')) !== false) {

            $rowIndex = 0;
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if ($rowIndex === 0) {
                    // First row => headers
                    $headers = $row;
                } else {
                    // Remaining rows => data
                    $clientsData[] = $row;
                }
                $rowIndex++;

            }
        }
        fclose($handle);

        return view('admin_panel.module.leadmanagement.Masteradmin.import-client-data-preview', compact(['headers', 'clientsData']));
    }
}
