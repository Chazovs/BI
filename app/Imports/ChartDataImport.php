<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
class ChartDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $i=0;
        foreach ($rows as $row)
        {
            $newData[$i] = array(
                'date' => $row[0],
                'value' => $row[1],
            );
            $i++;
        }
        return $newData;
    }
}
