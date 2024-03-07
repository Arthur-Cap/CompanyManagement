<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class projectController extends Controller
{

    public function create(Request $request, $id = 0)
    {
        if ($id === 0 || $id === null) return redirect('/');


        $numberPerPage = 102;
        $maxPage = ceil((Project::where('owner', $id)->count()) / $numberPerPage);
        try{
            $projects = Cache::lock('projec')->get(function () use ($request, $id, $numberPerPage) {
                sleep(5);
                $size = $request->input('size');
                $type = $request->input('type') === 'open' ? 'openDate' : 'closeDate';
                $start_date = $request->input('start_date') === null ? '0000-01-01' : $request->input('start_date');
                $end_date = $request->input('end_date') === null ? '2999-01-01' : $request->input('end_date');
                $page = $request->input('page');
                $keywordCustomer =  $request->input('search');
        
                $projects = Project::where('owner', $id)
                    ->where(function ($query) use ($keywordCustomer) {
                        $query->where('projects.name', 'like', '%' . $keywordCustomer . '%')
                            ->orWhere('projects.customer', 'like', '%' . $keywordCustomer . '%');
                    })->whereDate($type, '>=',  $start_date)
                    ->whereDate($type, '<=',  $end_date)
                    ->get();
        
                $maxPage = ceil((Project::where('owner', $id)->count()) / $numberPerPage);
        
                $projectCount = Project::join('tasks', 'projects.id', '=', 'tasks.project')
                    ->select('projects.name as Project', DB::raw('count(*) as Size'))
                    ->where('projects.owner', $id)
                    ->where(function ($query) use ($keywordCustomer) {
                        $query->where('projects.name', 'like', '%' . $keywordCustomer . '%')
                            ->orWhere('projects.customer', 'like', '%' . $keywordCustomer . '%');
                    })->whereDate('projects.' . $type, '>=',  $start_date)
                    ->whereDate('projects.' . $type, '<=',  $end_date)
                    ->groupBy('projects.name')
                    ->get();
        
                foreach ($projects as $project) {
                    foreach ($projectCount as $count) {
                        if ($project->name === $count->Project) $project->Size = $count->Size;
                    }
                }
        
                if ($size !== null) {
                    $projects = $projects->where('Size', $size);
                }
                
                return $projects;
            });
        } catch(\Illuminate\Contracts\Cache\LockTimeoutException $e){
            dd($e);
        }
    
        return view('CompanyWeb.company', compact('projects', 'maxPage'));
    }
    

    public function search(Request $request)
    {
        $startDay = $request->input('start_date');
        $endDay = $request->input('end_date');
        $type = $request->input('date_type');
        $size = $request->input('quantity');
        $search = $request->input('search-field');
        // $page =$request->input('page')==='/'?1:$request->input('page');
        $path = $request->input('url') . '?search=' . $search . '&size=' . $size . '&start_date=' . $startDay . '&end_date=' . $endDay . '&type=' . $type;
        return redirect($path);
    }
}
