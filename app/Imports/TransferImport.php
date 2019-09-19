<?php

namespace App\Imports;

use App\Transfer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

HeadingRowFormatter::default('none');

class TransferImport implements ToModel,WithHeadingRow
{

    protected function formatDateExcel($date){ if (gettype($date) === 'double') { $birthday = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date); return $birthday->format('Y-n-j'); } return $date; }


    public function model(array $row)
    {
        return new Transfer([
            'epf_no' =>$row['EPF No'],
            'name' =>$row['Name'],
            'dob' =>$this->formatDateExcel($row['Date of birth']),
            'present_work_station' =>$row['Present Work Station'],
            'maritial_status' =>$row['Marrital Status'],
            'reported_date' =>$this->formatDateExcel($row['Reported date for present work station']),
            'years' =>$row['Years'],
            'first_pref' =>$row['1st Preference'],
            'second_pref' =>$row['2nd preference'],
            'third_pref' =>$row['3rd Preference'],
            'reason' =>$row['Reason for transfer'],
            'address' =>$row['Address']

        ]);
    }
}
