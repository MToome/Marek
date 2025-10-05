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
                $values[0] ?? '',
                $values[1] ?? '',
                $values[8] ?? '',
                $values[9] ?? '',
                $values[10] ?? '',
            ];

            fputcsv($csvFile, $showData);
        }

        fclose($csvFile);
    }

    public function parseCsv()
    {
        $csvFilePath = storage_path('app/car_parts.csv');
        if (!file_exists($csvFilePath)) {
            $this->createCsvFile('app/LE.txt', 'app/car_parts.csv');
        }

        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(0); // first row = header
        $csv->setEscape('');

        $stmt = new Statement();
        $records = $stmt->process($csv);

        // Convert iterator to array
        $data = [];
        foreach ($records as $row) {
            $data[] = $row; // associative array based on CSV header
        }

        $headers = $csv->getHeader();

        return response()->json([
            'headers' => $headers,
            'rows' => $data,
        ]);
    }


    public function showTableView()
    {
        return view('csv_read');
    }
}
