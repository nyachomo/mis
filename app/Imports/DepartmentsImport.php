<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;


class DepartmentsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
   
    public function model(array $row)
    {
        return new Department([
            'department_name' => $row['department_name'],
            'department_status' => $row['department_status'],
        ]);
    }

    public function chunkSize(): int
    {
        return 300; // Adjust chunk size as needed
    }

    /**
     * Set the batch size.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 200; // Adjust batch size as needed
    }

}
