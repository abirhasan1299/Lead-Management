<?php

namespace App\Exports;

use App\Models\Leads;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Leads::select('id','name','email','phone','course','unclearPaper','enrolledYear','degreePurpose','date','nextfollowup','status','TotalFees','paidFees','Reference')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Course',
            'Unclear Paper',
            'Enrolled Year',
            'Degree Purpose',
            'Date',
            'Next Follow Up',
            'Status',
            'Total Fees',
            'Paid Fees',
            'Reference'
        ];
    }
}
