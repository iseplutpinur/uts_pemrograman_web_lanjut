<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MahasiswaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('mahasiswas')
            ->join('jurusans', 'jurusans.id', '=', 'mahasiswas.jurusan_id')
            ->select('mahasiswas.*', 'jurusans.*')
            ->get();
    }
}
