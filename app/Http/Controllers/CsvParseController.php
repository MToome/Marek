<?php

namespace App\Http\Controllers;

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

        foreach ($lines as $line) {
            // Split the line into columns (assuming tab-delimited input)
            // $columns = str_getcsv($line, "\t");

            $trimLine = [];
            $trimNameArray = [];

            $values = explode("\t", $line);

            foreach ($values as $value) {
                $trimValue = trim($value, '"');
                $trimValue = trim($trimValue, ',');
                $trimLine[] = mb_convert_encoding($trimValue, 'UTF-8', 'auto');
            }

            $name = explode(",", $trimLine[1]);
            $nameCon = "";

            foreach ($name as $nam) {
                $trimName = trim($nam, '"');
                $nameCon .= $trimName . " ";
            }
            $trimLine[1] = $nameCon;

            fputcsv($csvFile, $trimLine);
        }
        fclose($csvFile);
    }

    public function parseCsv()
    {
        $csvFilePath = storage_path('app\car_parts.csv');
        if (!file_exists($csvFilePath)) {
            $this->createCsvFile('app\LE.txt', 'app\car_parts.csv');
        }

        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setDelimiter(','); // Set the delimiter to comma (CSV standard)
        $csv->setHeaderOffset(null); // What row is the header
        $csv->setEscape(''); // Set escape character to default double quote

        // Get 25 records starting from the 11th row
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        // Convert the records to an array
        $data = iterator_to_array($records, true);
        $data = array_values($data);

        return response()->json($data);
    }
}
