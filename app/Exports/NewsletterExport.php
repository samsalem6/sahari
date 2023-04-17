<?php

namespace App\Exports;

use App\Model\Newsletter;
//use Maatwebsite\Excel\Concerns\FromCollection;


class NewsletterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newsletter::select('id','email','created_at')->get();
    }
}
