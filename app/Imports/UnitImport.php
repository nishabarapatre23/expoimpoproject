<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Unit([

            'section' => $row['section'],
            'deficiency_title' => $row['deficiency_title'],
            'deficiency_criteria' => $row['deficiency_criteria'],
            'criteria_detail' => $row['criteria_detail'],
            'note' => $row['note'],
            'health_safety' => $row['health_safety'],
            'correction_time_frame' => $row['correction_time_frame'],
        ]);
    }
}
?>
