<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company as _Company;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class Company extends Controller
{
    public function create()
    {
        $companies = _Company::with('companyProject', 'employee')->get();

        // Cache::forever('lockPage', true);
        // Cache::forget('lockPage');


        if (Cache::has('lockkPage')) {
            return 'The page is locked!';
        }
        

        // Cache::forever('lockkPage', true);

        $lockPage = Cache::get('lockPage');


            
        Cache::forget('project');
        return view('CompanyWeb.home', compact('companies'));


        // $size = [];
        // $nProject = [];

        // for ($i = 0; $i < $companies->count(); $i++) {
        //     $size[$i] = Project::where('owner', $companies[$i]->id)->sum('size');
        //     $nProject[] = Project::where('owner', $companies[$i]->id)->count();
        // }
        // return view('CompanyWeb.home', compact('companies', 'size', 'nProject'));
    }
}
