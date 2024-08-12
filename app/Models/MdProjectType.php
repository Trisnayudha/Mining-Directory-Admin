<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdProjectType extends Model
{
    use  HasFactory;
    protected $table = 'md_project_type';
    protected $fillable = [
        'name'
    ];
}
