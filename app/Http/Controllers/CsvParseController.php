<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;

class CsvParseController extends Controller
{
    public function createCsvFile($inputFile, $outputFile)
    {
        $fileLocation = storage_path($inputFile);
        $lines = file($fileLocation, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $csvFilePath = storage_path($outputFile);
        $csvFile = fopen($csvFilePath, "w");

        // Write header once
        fputcsv($csvFile, ['Serial nr', 'Name', 'Price without VAT', 'Type', 'Price with VAT']);

        foreach ($lines as $line) {
            $values = explode("\t", $line);
            $values = array_map(fn($v) => trim($v, "\" \t,"), $values);

            // Use comas to seperate
            $nameParts = explode(",", $values[1] ?? '');
            // Implode return string of array, separate with space each array element, trim "
            $name = implode(" ", array_map(fn($n) => trim($n, '"'), $nameParts));
            // Assigne better looking name
            $values[1] = $name;

            // Select the required columns
            $showData = [
                // ?? if their is no value use that what is between ''
                $values[0] ?? '0',
                $values[1] ?? '0',
                $values[8] ?? '0',
                $values[9] ?? '0',
                $values[10] ?? '0',
            ];

            fputcsv($csvFile, $showData);
        }

        fclose($csvFile);
    }

    public function parseCsv(Request $request)
    {
        $csvFilePath = storage_path('app/car_parts.csv');

        if (!file_exists($csvFilePath)) {
            $this->createCsvFile('app/LE.txt', 'app/car_parts.csv');
        }

        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(0);
        $csv->setEscape('');


        $stmt = new Statement();

        // Get all records as an iterator
        $records = $stmt->process($csv);
        $allData = iterator_to_array($records, true);
        $headers = $csv->getHeader();


        $search = strtolower($request->query('search', ''));
        if ($search !== '') {
            $allData = array_filter($allData, function ($row) use ($search) {
                foreach ($row as $value) {
                    if (stripos($value, $search) !== false) {
                        return true;
                    }
                }
                return false;
            });
        }

        // Pagination input
        $page = (int) $request->query('page', 1);
        $perPage = (int) $request->query('perPage', 25);

        // Pagination math        
        $total = count($allData);
        $offset = ($page - 1) * $perPage;
        $pagedData = array_slice($allData, $offset, $perPage);

        return response()->json([
            'headers' => $headers,
            'rows' => array_values($pagedData),
            'pagination' => [
                'page' => $page,
                'perPage' => $perPage,
                'total' => $total,
                'totalPages' => ceil($total / $perPage),
            ]
        ]);
    }


    public function showTableView()
    {
        return view('csv_read');
    }
}
