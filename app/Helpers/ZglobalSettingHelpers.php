<?php

use Illuminate\Support\Facades\DB;
use App\Models\GlobalSetting\MsterSetting\PrefixCounter;

if (!function_exists('generateFormNumber')) {
    /**
     * Generate the next form number for a given form name (e.g., 'inv', 'pay', 'quat').
     *
     * @param string $formName
     * @return string|null
     */
    function generateFormNumber(string $formName): ?string
    {
        return DB::transaction(function () use ($formName) {
            // Lock the row for update to prevent race conditions
            $setting = PrefixCounter::where('form_name', $formName)->lockForUpdate()->first();

            if (!$setting) {
                return null; // Or throw new \Exception("Form not found");
            }

            $prefix = $setting->prifix ?? '';
            $suffix = $setting->sufix ?? '';
            $counter = $setting->counter ?? 0;

            $newCounter = $counter + 1;

            // Format counter (e.g., 0001, 0002)
            $formattedCounter = str_pad($newCounter, 4, '0', STR_PAD_LEFT);

            // Final form number
            $formNumber = "{$prefix}{$formattedCounter}{$suffix}";

            // Update the counter in DB
            $setting->counter = $newCounter;
            $setting->save();

            return $formNumber;
        });
    }
}

