<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class PlansController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('plans as p')
            ->leftJoin('goals as g', 'g.plan_id', '=', 'p.id')
            ->leftJoin('skills as s', 's.plan_id', '=', 'p.id')
            ->select('p.*')
            ->whereNull('p.deleted_at');
        if ($request->filled('keyword')) {
            $kw = $request->input('keyword');
            $query->where(function($q) use ($kw) {
                $q->where('p.name', 'like', "%$kw%")
                  ->orWhere('p.race_name', 'like', "%$kw%");
            });
        }
        if ($request->filled('career_stage')) {
            $query->where('p.career_stage', $request->input('career_stage'));
        }
        if ($request->filled('class')) {
            $allowedClasses = ['debut', 'maiden', 'beginner', 'bronze', 'silver', 'gold', 'platinum', 'star', 'legend'];
            if (in_array($request->input('class'), $allowedClasses)) {
                $query->where('p.class', $request->input('class'));
            }
        }
        if ($request->filled('strategy')) {
            $query->where('p.strategy', $request->input('strategy'));
        }
        if ($request->filled('status')) {
            $query->where('p.status', $request->input('status'));
        }
        if ($request->filled('goal_result')) {
            $query->where('g.result', $request->input('goal_result'));
        }
        if ($request->filled('skill_name')) {
            $query->where('s.skill_name', $request->input('skill_name'));
        }
        $plans = $query->orderByDesc('p.created_at')->limit(20)->get();
        return response()->json(['plans' => $plans]);
    }
}
