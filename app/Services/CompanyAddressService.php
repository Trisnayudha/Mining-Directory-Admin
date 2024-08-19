<?php

namespace App\Services;

use App\Models\Company;
use App\Helpers\FileHelper;
use App\Imports\CompaniesImport;
use App\Models\CompanyAddress;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyAddressService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $company = Company::where('slug', $data['slug'])->first();
            $data['company_id'] = $company->id;
            // dd($data);
            $carousel = CompanyAddress::create($data);
            DB::commit();

            return ['status' => true, 'message' => 'Data created successfully.', 'data' => $carousel];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            $update = CompanyAddress::findOrFail($id);
            $update->update($data);
            DB::commit();

            return ['status' => true, 'message' => 'Data updated successfully.', 'data' => $data];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $data = CompanyAddress::findOrFail($id);
            $data->delete();
            DB::commit();

            return ['status' => true, 'message' => 'Data deleted successfully.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getAll($slug)
    {
        $company = $this->findCompanySlug($slug);
        return CompanyAddress::where('company_id', $company->id)->get();
    }

    public function find($id)
    {
        $data = CompanyAddress::findOrFail($id);
        $data['slug'] = $this->findCompanyid($data['company_id'])->slug;
        return $data;
    }

    private function findCompanySlug($slug)
    {
        return Company::where('slug', $slug)->first();
    }

    private function findCompanyId($id)
    {
        return Company::where('id', $id)->first();
    }
}
