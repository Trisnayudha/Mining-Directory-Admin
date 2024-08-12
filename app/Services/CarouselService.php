<?php

namespace App\Services;

use App\Models\MdCarousel;
use App\Helpers\FileHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarouselService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = FileHelper::saveFile($data['image'], 'public/images/carousel');
            }

            $carousel = MdCarousel::create($data);
            DB::commit();

            return ['status' => true, 'message' => 'carousel created successfully.', 'data' => $carousel];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            $carousel = MdCarousel::findOrFail($id);

            if (isset($data['image'])) {
                // Delete old image if exists
                if ($carousel->image) {
                    $oldImagePath = str_replace(url('/storage/'), 'public/', $carousel->image);
                    Storage::delete($oldImagePath);
                }
                $data['image'] = FileHelper::saveFile($data['image'], 'public/images/carousel');
            }

            $carousel->update($data);
            DB::commit();

            return ['status' => true, 'message' => 'carousel updated successfully.', 'data' => $carousel];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $carousel = MdCarousel::findOrFail($id);
            if ($carousel->image) {
                $oldImagePath = str_replace(url('/storage/'), 'public/', $carousel->image);
                Storage::delete($oldImagePath);
            }
            $carousel->delete();
            DB::commit();

            return ['status' => true, 'message' => 'carousel deleted successfully.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getAll()
    {
        return MdCarousel::all();
    }

    public function find($id)
    {
        return MdCarousel::findOrFail($id);
    }
}
