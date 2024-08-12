<?php

namespace App\Services;

use App\Models\MdStatistic;
use Exception;
use Illuminate\Support\Facades\DB;

class StatisticService
{
    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            $category = MdStatistic::findOrFail($id);

            $category->update($data);
            DB::commit();

            return ['status' => true, 'message' => 'Category updated successfully.', 'data' => $category];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function find()
    {
        return MdStatistic::first();
    }
}
