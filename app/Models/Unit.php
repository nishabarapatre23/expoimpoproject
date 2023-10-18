<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'section',
        'deficiency_title',
        'deficiency_criteria',
        'criteria_detail',
        'note',
        'health_and_safety',
        'correction_time_frame',
    ];
}
