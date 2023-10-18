<?php

namespace App\Exports;

// use App\Models\Student;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No',
            'Section',
            'Deficiency Title',
            'Deficiency Criteria',
            'Criteria Detail',
            'Note',
            'Health & Safety',
            'Correction  Time frame',
            // Add more headings for each column
        ];
    }
    public function collection()
    {
        return Unit::all();
    }
}
