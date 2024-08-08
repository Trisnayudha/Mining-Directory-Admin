<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\CompanyCategory;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompaniesImport
{
    public function import(Request $request)
    {
        $file = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        $category_id = $request->category_id;
        // Skip the header row and iterate through the data rows
        foreach (array_slice($rows, 1) as $row) {
            if (isset($row[2]) && !empty(trim($row[2]))) {
                $company = Company::create([
                    'package' => 'free',  // Adjust this based on the actual column order
                    'company_name' => $row[2],
                    'location' => $row[5],
                    'slug' => Str::slug($row[2]),  // Generate a slug from the company name
                    'email_company' => $row[9],  // Adjust if necessary
                    'phone_company' => $row[8],  // Adjust if necessary
                ]);
                CompanyCategory::create([
                    'company_id' => $company->id,
                    'category_id' => $category_id
                ]);
            }
            if (isset($row[4]) && !empty(trim($row[4]))) {
                CompanyAddress::create([
                    'address' => $row[4],
                    'company_id' => $company->id,
                    'city' => $row[5],
                    'province' => $row[6],
                    'postal_code' => $row[7],
                    'type' => 'Headquarter'
                ]);
            }
        }
    }
}
