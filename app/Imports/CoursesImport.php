<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CoursesImport implements ToModel,WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course([
            'course_name' => $row['course_name'],
            'course_level' => $row['course_level'],
            'course_duration' => $row['course_duration'],
            'course_price' => $row['course_price'],
            'course_status' => $row['course_status'],
        ]);
    }

    public function chunkSize(): int
    {
        return 300; // Adjust chunk size as needed
    }

    public function batchSize(): int
    {
        return 200; // Adjust batch size as needed
    }
}
