<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description'
    ];
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
