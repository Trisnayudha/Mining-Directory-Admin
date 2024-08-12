<?php

namespace App\Services;

use App\Models\MdProjectType;
use App\Helpers\FileHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectTypeService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $category = MdProjectType::create($data);
            DB::commit();

            return ['status' => true, 'message' => 'Category created successfully.', 'data' => $category];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            $category = MdProjectType::findOrFail($id);

            $category->update($data);
            DB::commit();

            return ['status' => true, 'message' => 'Category updated successfully.', 'data' => $category];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $category = MdProjectType::findOrFail($id);

            $category->delete();
            DB::commit();

            return ['status' => true, 'message' => 'Category deleted successfully.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getAll()
    {
        return MdProjectType::all();
    }

    public function find($id)
    {
        return MdProjectType::findOrFail($id);
    }
}
