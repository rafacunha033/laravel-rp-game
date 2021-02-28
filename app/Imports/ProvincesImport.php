<?php
namespace App\Imports;

use App\Provinces;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ProvincesImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Province([
            'name' => $row[0],
            'country' => $row[1],
        ]);
    }
}