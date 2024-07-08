<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSVController extends Controller
{
    public function download($model)
    {
        $modelPath = 'App\Models\\' . ucfirst($model);
        $records = app()->make($modelPath)->all() ?? [];
        if (count($records) == 0) {
            return redirect()->back()->with('error', 'No records found');
        }
        $headers = array_keys($records->first()->getAttributes());
        $csv = [];
        foreach ($records as $record) {
            $csv[] = $record->getAttributes();
        }

        $csvData = implode(',', $headers) . "\n" . implode("\n", array_map(function ($row) {
                        return implode(',', array_values($row));
                    }, $csv));

        $httpHeaders = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $model . '.csv',
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        return response()->streamDownload(
            function () use ($csvData) {
                echo $csvData;
            },
            $model . '.csv',
            $httpHeaders
        );
    }
}
