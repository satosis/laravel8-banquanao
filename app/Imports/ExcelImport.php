<?php

namespace App\Imports;

use DB;
use App\Models\Userschinese;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Xxx|null
     */
    public function model(array $row)
    {
        if ($row[1]) {
            DB::insert('insert into userschinese (name, sex, sbd, certificate_no, level, date, listening_point, reading_point, speaking_point, writting_point)
            values (?, ?,?, ?,?, ?,?, ?,?, ?)', [$row[1], $row[2],$row[3], $row[4], $row[5], 'May 19, 2024', $row[7] ? $row[7] : 0,$row[8] ? $row[8] : 0,$row[11] ? $row[11] : 0,$row[9] ? $row[9] : 0]);
            return new Userschinese();
        }
        return new Userschinese();
    }
}
