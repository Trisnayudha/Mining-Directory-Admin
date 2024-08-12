<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdCarousel extends Model
{
    use  HasFactory;
    protected $table = 'md_carousel';
    protected $fillable = [
        'link',
        'image'
    ];
}
