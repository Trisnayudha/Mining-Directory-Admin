<?php

namespace App\Services;

use App\Models\MdPrivacy;
use App\Models\MdTerm;
use Exception;
use Illuminate\Support\Facades\DB;

class PrivacyTermService
{
    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            // Mengambil data content dari array $data
            $contentPrivacy = $data['content_privacy'] ?? null;
            $contentTerm = $data['content_term'] ?? null;

            // Update data pada model MdPrivacy
            $privacy = MdPrivacy::findOrFail($id);
            $privacy->update(['content' => $contentPrivacy]);

            // Update data pada model MdTerm
            $term = MdTerm::findOrFail($id);
            $term->update(['content' => $contentTerm]);

            DB::commit();

            return ['status' => true, 'message' => 'Privacy and Terms updated successfully.', 'data' => ['privacy' => $privacy, 'term' => $term]];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function findPrivacy()
    {
        return MdPrivacy::first();
    }

    public function findTerm()
    {
        return MdTerm::first();
    }
}
