<?php

namespace App\Services;

use App\Models\MdCategoryCompany;
use App\Helpers\FileHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = FileHelper::saveFile($data['image'], 'public/images/category');
            }

            $category = MdCategoryCompany::create($data);
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

            $category = MdCategoryCompany::findOrFail($id);

            if (isset($data['image'])) {
                // Delete old image if exists
                if ($category->image) {
                    $oldImagePath = str_replace(url('/storage/'), 'public/', $category->image);
                    Storage::delete($oldImagePath);
                }
                $data['image'] = FileHelper::saveFile($data['image'], 'public/images/category');
            }

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

            $category = MdCategoryCompany::findOrFail($id);
            if ($category->image) {
                $oldImagePath = str_replace(url('/storage/'), 'public/', $category->image);
                Storage::delete($oldImagePath);
            }
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
        return MdCategoryCompany::all();
    }

    public function find($id)
    {
        return MdCategoryCompany::findOrFail($id);
    }
}
