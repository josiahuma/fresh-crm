<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            //
            'first_name' => $row[0],
            'last_name' => $row[1],
            'mobile_number' => $row[2],
            'date_of_birth' => $row[3],
            'anniversary_date' => $row[4],
            'church_unit' => $row[5],
            'custom_fields' => $row[6],
            // Add other fields as necessary
        ]);
    }
}
