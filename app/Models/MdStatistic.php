<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdStatistic extends Model
{
    use  HasFactory;
    protected $table = 'md_statistic';
    protected $fillable = [
        'data_1',
        'data_2',
        'data_3',
    ];
}
