<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 0;
        foreach($collection as $row){
            if ($indexKe > 1) {
                $data['name'] = !empty($row[1]) ? $row[1] : '';
                $data['email'] = !empty($row[2]) ? $row[2] : '';
                $data['password']= !empty($row[3]) ? Hash::make($row[3]) : '';
                
                User::create($data);
            }

            $indexKe++;
        }
    }
}
