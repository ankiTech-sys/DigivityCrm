<?php
use App\Models\GlobalSetting\MsterSetting\Financial\FinancialYearModel;
use Illuminate\Support\Facades\Session;


if (!function_exists('setActiveAcademicSession')) {
    function setActiveFinancialSession()
    {
        $activeSession = FinancialYearModel::where('is_active', 'yes')->first();

        if ($activeSession) {
            Session::put([
                'id' => $activeSession->id,
                'financial_session' => $activeSession->financial_session,
                'start_date' => $activeSession->start_date,
                'end_date' => $activeSession->end_date,
            ]);
        } else {
            Session::forget(['id', 'financial_session', 'start_date', 'end_date']);
        }
    }
}


if (!function_exists('nowdate')) {
    function nowdate($date, $format)
    {
        if (!$format) {
            $format = "Y-m-d";
        }
        return \Carbon\Carbon::createFromDate($date)->format($format);
    }
}
