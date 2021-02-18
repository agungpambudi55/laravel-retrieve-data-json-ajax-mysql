<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'tb_employee';

    protected $fillable = [
        'id',
        'employee_name',
        'employee_salary',
        'employee_age',
        'profile_image'
    ];
}
