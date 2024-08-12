<?php

namespace App\Services;

use App\Models\MdCategoryPopular;
use App\Helpers\FileHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PopularCategoryService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $category = MdCategoryPopular::create($data);
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

            $category = MdCategoryPopular::findOrFail($id);

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

            $category = MdCategoryPopular::findOrFail($id);

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
        return MdCategoryPopular::with('category')->get();
    }


    public function find($id)
    {
        return MdCategoryPopular::findOrFail($id);
    }
}
