<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Employee;


class Company extends Model
{
    use HasFactory;
    protected $table = "companies";

    protected $fillable = [
        'name', 
        'email', 
        'website', 
        'address', 
        'phone_number', 
        'founded_date', 
        'description', 

    ];

    public function companyProject()
    {
        return $this->hasMany(Project::class, 'owner');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'company');
    }
}
