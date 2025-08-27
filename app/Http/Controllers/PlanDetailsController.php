<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class PlanDetailsController extends Controller
{
    public function fetch($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid plan ID.'], 400);
        }
        $plan = DB::table('plans as p')
            ->leftJoin('moods as m', 'p.mood_id', '=', 'm.id')
            ->leftJoin('strategies as s', 'p.strategy_id', '=', 's.id')
            ->select('p.*', 'm.label as mood_label', 's.label as strategy_label')
            ->where('p.id', $id)
            ->whereNull('p.deleted_at')
            ->first();
        if ($plan) {
            return response()->json(['success' => true, 'plan' => $plan]);
        } else {
            return response()->json(['success' => false, 'error' => 'Plan not found.'], 404);
        }
    }
}
