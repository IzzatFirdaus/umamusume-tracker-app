<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $planId = (int) $request->query('id', 0);
        $isTxt = $request->query('format') === 'txt';
        if ($planId <= 0) {
            return response()->json(['error' => 'Invalid Plan ID provided.'], 400);
        }
        $plan = DB::table('plans as p')
            ->leftJoin('moods as m', 'p.mood_id', '=', 'm.id')
            ->leftJoin('conditions as cond', 'p.condition_id', '=', 'cond.id')
            ->leftJoin('strategies as strat', 'p.strategy_id', '=', 'strat.id')
            ->select('p.growth_rate_wit', 'p.status', 'p.source', 'p.trainee_image_path')
            ->where('p.id', $planId)
            ->whereNull('p.deleted_at')
            ->first();
        if (!$plan) {
            return response()->json(['error' => 'Plan not found.'], 404);
        }
        $plan->attributes = DB::table('attributes')->select('attribute_name', 'value', 'grade')->where('plan_id', $planId)->get();
        $plan->skills = DB::table('skills')->select('skill_name', 'sp_cost', 'acquired', 'tag', 'notes')->where('plan_id', $planId)->get();
        $plan->terrain_grades = DB::table('terrain_grades')->select('terrain', 'grade')->where('plan_id', $planId)->get();
        $plan->distance_grades = DB::table('distance_grades')->select('distance', 'grade')->where('plan_id', $planId)->get();
        $plan->style_grades = DB::table('style_grades')->select('style', 'grade')->where('plan_id', $planId)->get();
        $plan->race_predictions = DB::table('race_predictions')->where('plan_id', $planId)->get();
        $plan->goals = DB::table('goals')->select('goal', 'result')->where('plan_id', $planId)->get();
        if ($isTxt) {
            // For brevity, just return JSON as plain text
            return response()->make(json_encode($plan, JSON_PRETTY_PRINT), 200, ['Content-Type' => 'text/plain']);
        } else {
            return response()->json($plan);
        }
    }
}
