<?php
namespace App\Imports;

use App\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class CountriesImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Country([
            'name' => $row[0],
            'img_slug' => $row[1],
        ]);
    }
}