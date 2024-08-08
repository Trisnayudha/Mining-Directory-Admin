<?php

namespace App\Services;

use App\Models\Company;
use App\Helpers\FileHelper;
use App\Imports\CompaniesImport;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyService
{
    protected $importer;

    public function __construct(CompaniesImport $importer)
    {
        $this->importer = $importer;
    }
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['slug'] = Str::slug($data['company_name']);
            $company = Company::create($data);
            DB::commit();

            return ['status' => true, 'message' => 'company created successfully.', 'data' => $company];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function update($id, $data)
    {
        try {
            DB::beginTransaction();

            $company = Company::findOrFail($id);
            $company->update($data);
            DB::commit();

            return ['status' => true, 'message' => 'company updated successfully.', 'data' => $company];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $Company = Company::findOrFail($id);

            $Company->delete();
            DB::commit();

            return ['status' => true, 'message' => 'Company deleted successfully.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getAll($request)
    {
        $query = Company::query();

        // Search functionality
        if ($request->has('query') && $request->query('query') !== '') {
            $query->where('company_name', 'like', '%' . $request->query('query') . '%');
        }

        // Pagination limit
        $limit = $request->get('limit', 12);

        // Order by ID descending
        $query->orderBy('id', 'desc');

        // Return paginated results
        return $query->paginate($limit);
    }

    public function find($id)
    {
        return Company::findOrFail($id);
    }

    public function import($request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'file' => 'required|mimes:xlsx,xls|max:2048',
            ]);

            $this->importer->import($request);

            DB::commit();

            return ['status' => true, 'message' => 'File imported successfully.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
