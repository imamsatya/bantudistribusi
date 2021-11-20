<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Temp;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToCollection, WithCalculatedFormulas, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    public function collection(Collection $rows)
    {
        // Temp::all()->delete();
        foreach ($rows as $row) 
        {
            Temp::create([
                'kolom1' => $row[0],
                'kolom2' => $row[1],
                'kolom3' => $row[2],
                'kolom4' => $row[3],
                'kolom5' => $row[4],
                'kolom6' => $row[5],
                'kolom7' => $row[6],
                'kolom8' => $row[7],
                'kolom9' => $row[8],
                'kolom10' => $row[9],
                'kolom11' => $row[10],
                'kolom12' => $row[10],

            ]);
        }
    }
}