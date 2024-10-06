<?php

namespace App\Exports;

use App\Models\Clas;
use App\Models\Department;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ClasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clas::with(['department'])->get();
    }

    public function headings(): array
    {
        // Define the column headers
        return [
            'clas_name',
            'clas_status',
            'department',
            'created_at',
            // Add more headers if needed
        ];
    }


    public function map($clas): array
    {
        return [
            $clas->clas_name,
            $clas->clas_status,
            $clas->department ? $clas->department->department_name : 'N/A',
            $clas->created_at,
            // Add other data as needed
        ];
    }
}
