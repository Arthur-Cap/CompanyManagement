<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Project;


class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $fillable = [
        'name', 
        'content', 
        'openDate', 
        'deadLine', 
        'employee', 
        'project', 
        'status', 
    ];

    public function assignedEmployee()
    {
        return $this->belongsTo(Employee::class, 'employee', 'id');
    }

    public function assignedProject()
    {
        return $this->belongsTo(Project::class, 'project', 'id');
    }
}
