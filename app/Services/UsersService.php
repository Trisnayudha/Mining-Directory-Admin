<?php

namespace App\Services;

use App\Models\User;
use App\Helpers\FileHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $category = User::create($data);
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

            $category = User::findOrFail($id);


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

            $category = User::findOrFail($id);

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
        return User::all();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }
}
