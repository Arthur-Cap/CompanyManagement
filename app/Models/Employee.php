<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'email', 
        'gender', 
        'role', 
        'address', 
        'phone_number', 
        'join_date', 

    ];

    public function employeeTask()
    {
        return $this->hasMany(Task::class, 'employee');
    }
}
