<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class StatsController extends Controller
{
    public function getStats() {
        $stats = DB::table('plans')->selectRaw('COUNT(*) AS total_plans, SUM(CASE WHEN status = "Active" THEN 1 ELSE 0 END) AS active_plans, SUM(CASE WHEN status = "Finished" THEN 1 ELSE 0 END) AS finished_plans, SUM(CASE WHEN status = "Planning" THEN 1 ELSE 0 END) AS planning_plans, COUNT(DISTINCT name) AS unique_trainees')->whereNull('deleted_at')->first();
        $safeStats = [
            'total_plans' => (int)($stats->total_plans ?? 0),
            'active_plans' => (int)($stats->active_plans ?? 0),
            'finished_plans' => (int)($stats->finished_plans ?? 0),
            'planning_plans' => (int)($stats->planning_plans ?? 0),
            'unique_trainees' => (int)($stats->unique_trainees ?? 0),
        ];
        return response()->json(['success' => true, 'stats' => $safeStats]);
    }
}
