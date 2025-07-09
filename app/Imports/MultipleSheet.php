<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheet implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new MobileImport(),
            1 => new RumahImport(),
        ];
    }
}
