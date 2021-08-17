<?php

namespace App\Imports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NewsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new News([
            'title'     => $row['title'],
            'description'    => $row['description'],
            'link'    => $row['link'],
            'publication_date'    => $row['publication_date'],
            'publisher_name'    => $row['publisher_name'],
        ]);
    }


    public function headingRow(): int
    {
        return 1;
    }
}
