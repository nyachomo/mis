<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CoursesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::with('department')  // Eager load the department
            ->get()
            ->map(function ($course) {
                return [
                    'course_name' => $course->course_name,
                    'course_level' => $course->course_level,
                    'course_duration' => $course->course_duration,
                    'department'  => $course->department ? $course->department->department_name : 'N/A',
                    'course_price' => $course->course_price,
                    'created_at' => $course->created_at,
                ];
            });
    }

    public function headings(): array
    {
        // Define the column headers
        return [
           
            'course_name',
            'course_level',
            'course_duration',
            'department',
            'course_price',
            'created_at',
           
            // Add more headers if needed
        ];
    }
}
