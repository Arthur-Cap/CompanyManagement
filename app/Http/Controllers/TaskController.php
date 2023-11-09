<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create($project = 0){
        if($project == 0) return redirect('/');

        
        $tasks = Task::where('project',$project)->with('assignedEmployee')->get();
     


        return view('CompanyWeb.project')->with('tasks',$tasks);
    }
}
