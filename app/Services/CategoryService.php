<?php

namespace App\Services;

use App\Models\CompanyCategory as Category;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $category = Category::create($data);

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

            $category = Category::findOrFail($id);
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

            $category = Category::findOrFail($id);
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
        return Category::all();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }
}
