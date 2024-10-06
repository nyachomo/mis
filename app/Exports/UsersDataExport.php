<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersDataExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        // Define the column headers
        return [
            'id',
            'name',
            'role',
            'phone',
            'status',
            'email',
            'password',
        ];
    }

}
