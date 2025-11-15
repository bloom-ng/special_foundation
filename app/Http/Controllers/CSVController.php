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

        $firstRecord = $records->first();
        $useMappedArray = method_exists($firstRecord, 'toMappedArray');
        
        // Get headers from mapped array or attributes
        if ($useMappedArray) {
            $sampleData = $firstRecord->toMappedArray();
            $headers = array_keys($sampleData);
        } else {
            $headers = array_keys($firstRecord->getAttributes());
        }

        // Convert headers to human-readable format
        $readableHeaders = array_map(function ($header) {
            return ucwords(str_replace('_', ' ', $header));
        }, $headers);

        $csv = [];
        foreach ($records as $record) {
            // Check if the mapping function exists
            $rowData = $useMappedArray ? $record->toMappedArray() : $record->getAttributes();
            $csv[] = $rowData;
        }

        // Generate CSV with proper escaping
        $csvData = $this->generateCSV($readableHeaders, $csv, $headers);

        $httpHeaders = [
            "Content-type" => "text/csv; charset=UTF-8",
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

    /**
     * Generate properly formatted CSV data with escaping
     */
    private function generateCSV($headers, $data, $headerKeys)
    {
        // Add UTF-8 BOM for Excel compatibility
        $output = "\xEF\xBB\xBF";
        
        // Write headers
        $output .= $this->escapeCSVRow($headers);
        
        // Write data rows
        foreach ($data as $row) {
            $rowValues = [];
            foreach ($headerKeys as $key) {
                $value = $row[$key] ?? '';
                // Convert to string and handle null values
                $rowValues[] = $value === null ? '' : (string) $value;
            }
            $output .= $this->escapeCSVRow($rowValues);
        }
        
        return $output;
    }

    /**
     * Escape a CSV row properly
     */
    private function escapeCSVRow($row)
    {
        $escapedRow = [];
        foreach ($row as $field) {
            // Convert to string
            $field = (string) $field;
            
            // If field contains comma, quote, or newline, wrap in quotes and escape quotes
            if (strpos($field, ',') !== false || 
                strpos($field, '"') !== false || 
                strpos($field, "\n") !== false ||
                strpos($field, "\r") !== false) {
                // Escape quotes by doubling them
                $field = str_replace('"', '""', $field);
                // Wrap in quotes
                $field = '"' . $field . '"';
            }
            
            $escapedRow[] = $field;
        }
        
        return implode(',', $escapedRow) . "\n";
    }
}
