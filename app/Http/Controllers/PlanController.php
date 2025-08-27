<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class PlanController extends Controller
{
    public function getAttributes($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }

        $attributes = DB::table('attributes')
            ->select('attribute_name', 'value', 'grade')
            ->where('plan_id', $id)
            ->orderBy('id')
            ->get();

        return response()->json(['success' => true, 'attributes' => $attributes]);
    }

    public function getDistanceGrades($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('distance_grades')->select('distance', 'grade')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'distance_grades' => $rows]);
    }

    public function getGoals($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('goals')->select('goal', 'result')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'goals' => $rows]);
    }

    public function getPredictions($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('race_predictions')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'predictions' => $rows]);
    }

    public function getSkills($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('skills')->select('skill_name', 'sp_cost', 'acquired', 'tag', 'notes')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'skills' => $rows]);
    }

    public function getStyleGrades($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('style_grades')->select('style', 'grade')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'style_grades' => $rows]);
    }

    public function getTerrainGrades($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('terrain_grades')->select('terrain', 'grade')->where('plan_id', $id)->orderBy('id')->get();
        return response()->json(['success' => true, 'terrain_grades' => $rows]);
    }

    public function getTurns($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'error' => 'Invalid Plan ID.'], 400);
        }
        $rows = DB::table('turns')->where('plan_id', $id)->orderBy('turn_number')->get();
        return response()->json(['success' => true, 'turns' => $rows]);
    }
}
