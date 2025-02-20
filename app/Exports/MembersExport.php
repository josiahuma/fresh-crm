<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MembersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $leaderName;

    public function __construct($leaderName)
    {
        $this->leaderName = $leaderName;
    }

    public function collection()
    {
        return Member::where('church_leader', $this->leaderName)->get([
            'id', 'first_name', 'last_name', 'mobile_number', 'email', 'custom_fields'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Mobile',
            'Email',
            'Custom Fields'
        ];
    }
}
