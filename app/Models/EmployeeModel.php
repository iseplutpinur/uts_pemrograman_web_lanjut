<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'emp_id',
        'emp_name',
        'position',
        'emp_email',
        'emp_phone',
        'emp_address'
    ];
}
