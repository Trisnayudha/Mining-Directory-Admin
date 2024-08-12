<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdSubCategoryCompany extends Model
{
    protected $table = 'md_sub_category_company';
    protected $fillable = [
        'name',
        'image',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(MdCategoryCompany::class, 'category_id', 'id');
    }
}
